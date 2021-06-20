<?php

namespace Drupal\opigno_module\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Link;
use Drupal\Core\File\FileSystemInterface;
use Drupal\file\Entity\File;
use Drupal\group\Entity\Group;
use Drupal\h5p\Entity\H5PContent;
use Drupal\h5p\H5PDrupal\H5PDrupal;
use Drupal\h5peditor\H5PEditor\H5PEditorUtilities;
use Drupal\media\Entity\Media;
use Drupal\opigno_group_manager\Entity\OpignoGroupManagedContent;
use Drupal\opigno_group_manager\Entity\OpignoGroupManagedLink;
use Drupal\opigno_module\Entity\OpignoActivity;
use Drupal\opigno_module\Entity\OpignoModule;
use Drupal\opigno_module\H5PImportClasses\H5PEditorAjaxImport;
use Drupal\opigno_module\H5PImportClasses\H5PStorageImport;

/**
 * Import Course form.
 */
class ImportCourseForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'import_course_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $mode = NULL) {
    $form['course_opi'] = [
      '#title' => $this->t('Course'),
      '#type' => 'file',
      '#description' => $this->t('Here you can import course. Allowed extension: opi'),
    ];

    $ajax_id = "ajax-form-entity-external-package";
    $form['#attributes']['class'][] = $ajax_id;
    $form['#attached']['library'][] = 'opigno_module/ajax_form';

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Import'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    // Validation is optional.
    if (empty($_FILES['files']['name']['course_opi'])) {
      // Only need to validate if the field actually has a file.
      $form_state->setError(
        $form['course_opi'],
        $this->t("The file was not uploaded.")
      );
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Prepare folder.
    $temporary_file_path = 'public://opigno-import';
    \Drupal::service('file_system')->deleteRecursive($temporary_file_path);
    \Drupal::service('file_system')->prepareDirectory($temporary_file_path, FileSystemInterface::MODIFY_PERMISSIONS | FileSystemInterface::CREATE_DIRECTORY);

    // Prepare file validators.
    $extensions = ['opi'];
    $validators = [
      'file_validate_extensions' => $extensions,
    ];

    $files = [];
    $file = file_save_upload('course_opi', $validators, $temporary_file_path, NULL, FileSystemInterface::EXISTS_REPLACE);
    if (!empty($file[0])) {
      $path = \Drupal::service('file_system')->realpath($file[0]->getFileUri());
      $folder = DRUPAL_ROOT . '/sites/default/files/opigno-import';

      $zip = new \ZipArchive();
      $result = $zip->open($path);

      if ($result === TRUE) {
        $zip->extractTo($folder);
        $zip->close();
      }

      \Drupal::service('file_system')->delete($path);
      $files = scandir($folder);
    }
    if (in_array('list_of_files.json', $files)) {
      $file_path = $temporary_file_path . '/list_of_files.json';
      $real_path = \Drupal::service('file_system')->realpath($file_path);
      $file = file_get_contents($real_path);

      $format = 'json';
      $ids = [];
      $serializer = \Drupal::service('serializer');
      $content = $serializer->decode($file, $format);

      $file_path = $temporary_file_path . '/' . $content['course'];
      $real_path = \Drupal::service('file_system')->realpath($file_path);
      $file = file_get_contents($real_path);
      $course_content_array = $serializer->decode($file, $format);
      $course_content = reset($course_content_array);

      $new_course = Group::create([
        'type' => 'opigno_course',
        'langcode' => $course_content['langcode'][0]['value'],
        'label' => $course_content['label'][0]['value'],
        'badge_active' => $course_content['badge_active'][0]['value'],
        'badge_criteria' => $course_content['badge_criteria'][0]['value'],
        'field_guided_navigation' => $course_content['field_guided_navigation'][0]['value'],
      ]);

      if ($course_content['badge_active'][0]['value'] == 1) {
        $new_course->badge_name->value = $course_content['badge_name'][0]['value'];
        $new_course->badge_description->value = $course_content['badge_description'][0]['value'];
      }

      if (!empty($course_content['field_course_description'][0])) {
        $new_course->field_course_description->value = $course_content['field_course_description'][0]['value'];
        $new_course->field_course_description->format = $course_content['field_course_description'][0]['format'];
      }

      $new_course->save();
      $ids['course'][$course_content['id'][0]['value']] = $new_course->id();

      foreach ($content['modules'] as $module_name => $module_path) {
        $file_path = $temporary_file_path . '/' . $module_path;
        $real_path = \Drupal::service('file_system')->realpath($file_path);
        $file = file_get_contents($real_path);
        $module_content_array = $serializer->decode($file, $format);
        $module_content = reset($module_content_array);

        $new_module = OpignoModule::create([
          'type' => 'opigno_module',
          'langcode' => $module_content['langcode'][0]['value'],
          'name' => $module_content['name'][0]['value'],
          'status' => $module_content['status'][0]['value'],
          'random_activity_score' => $module_content['random_activity_score'][0]['value'],
          'allow_resume' => $module_content['allow_resume'][0]['value'],
          'backwards_navigation' => $module_content['backwards_navigation'][0]['value'],
          'randomization' => $module_content['randomization'][0]['value'],
          'random_activities' => $module_content['random_activities'][0]['value'],
          'takes' => $module_content['takes'][0]['value'],
          'show_attempt_stats' => $module_content['show_attempt_stats'][0]['value'],
          'keep_results' => $module_content['keep_results'][0]['value'],
          'hide_results' => $module_content['hide_results'][0]['value'],
          'badge_active' => $module_content['badge_active'][0]['value'],
          'badge_criteria' => $module_content['badge_criteria'][0]['value'],
        ]);

        if ($module_content['badge_active'][0]['value'] == 1) {
          $new_module->badge_name->value = $module_content['badge_name'][0]['value'];
          $new_module->badge_description->value = $module_content['badge_description'][0]['value'];
        }

        if (!empty($module_content['description'][0])) {
          $new_module->description->value = $module_content['description'][0]['value'];
          $new_module->description->format = $module_content['description'][0]['format'];
        }

        $new_module->save();
        $ids['module'][$module_content['id'][0]['value']] = $new_module->id();
        $managed_content = $module_content['managed_content'];
        $parent_links = $module_content['parent_links'];

        $new_course->addContent($new_module, 'opigno_module_group');
        $add_activities = [];

        $new_content = OpignoGroupManagedContent::createWithValues(
          $new_course->id(),
          $managed_content['group_content_type_id'][0]['value'],
          $new_module->id(),
          $managed_content['success_score_min'][0]['value'],
          $managed_content['is_mandatory'][0]['value'],
          $managed_content['coordinate_x'][0]['value'],
          $managed_content['coordinate_y'][0]['value']
        );

        $new_content->save();
        $ids['link'][$managed_content['id'][0]['value']] = $new_content->id();

        foreach ($content['activities'][$module_name] as $activity_file_name) {
          $file_path = $temporary_file_path . '/' . $activity_file_name;
          $real_path = \Drupal::service('file_system')->realpath($file_path);
          $file = file_get_contents($real_path);
          $activity_content_array = $serializer->decode($file, $format);
          $activity_content = reset($activity_content_array);

          $new_activity = OpignoActivity::create([
            'type' => $activity_content['type'][0]['target_id'],
          ]);

          $new_activity->setName($activity_content['name'][0]['value']);
          $new_activity->set('langcode', $activity_content['langcode'][0]['value']);
          $new_activity->set('status', $activity_content['status'][0]['value']);

          switch ($activity_content['type'][0]['target_id']) {
            case 'opigno_long_answer':
              $new_activity->opigno_body->value = $activity_content['opigno_body'][0]['value'];
              $new_activity->opigno_body->format = $activity_content['opigno_body'][0]['format'];
              $new_activity->opigno_evaluation_method->value = $activity_content['opigno_evaluation_method'][0]['value'];
              break;

            case 'opigno_file_upload':
              $new_activity->opigno_body->value = $activity_content['opigno_body'][0]['value'];
              $new_activity->opigno_body->format = $activity_content['opigno_body'][0]['format'];
              $new_activity->opigno_evaluation_method->value = $activity_content['opigno_evaluation_method'][0]['value'];
              $new_activity->opigno_allowed_extension->value = $activity_content['opigno_allowed_extension'][0]['value'];
              break;

            case 'opigno_scorm':
              foreach ($activity_content['files'] as $file_key => $file_content) {
                $scorm_file_path = $temporary_file_path . '/' . $file_key;
                $uri = \Drupal::service('file_system')->copy($scorm_file_path, 'public://opigno_scorm/' . $file_content['file_name'], FileSystemInterface::EXISTS_RENAME);

                $file = File::Create([
                  'uri' => $uri,
                  'uid' => $this->currentUser()->id(),
                  'status' => $file_content['status'],
                ]);
                $file->save();
                $fid = $file->id();
                $new_activity->opigno_scorm_package->target_id = $fid;
                $new_activity->opigno_scorm_package->display = 1;
              }
              break;

            case 'opigno_tincan':
              foreach ($activity_content['files'] as $file_key => $file_content) {
                $tincan_file_path = $temporary_file_path . '/' . $file_key;
                $uri = \Drupal::service('file_system')->copy($tincan_file_path, 'public://opigno_tincan/' . $file_content['file_name'], FileSystemInterface::EXISTS_RENAME);

                $file = File::Create([
                  'uri' => $uri,
                  'uid' => $this->currentUser()->id(),
                  'status' => $file_content['status'],
                ]);
                $file->save();
                $fid = $file->id();
                $new_activity->opigno_tincan_package->target_id = $fid;
                $new_activity->opigno_tincan_package->display = 1;
              }
              break;

            case 'opigno_slide':
              foreach ($activity_content['files'] as $file_key => $file_content) {
                $slide_file_path = $temporary_file_path . '/' . $file_key;
                $current_timestamp = \Drupal::time()->getCurrentTime();
                $date = date('Y-m', $current_timestamp);
                $uri = \Drupal::service('file_system')->copy($slide_file_path, 'public://' . $date . '/' . $file_content['file_name'], FileSystemInterface::EXISTS_RENAME);

                $file = File::Create([
                  'uri' => $uri,
                  'uid' => $this->currentUser()->id(),
                  'status' => $file_content['status'],
                ]);
                $file->save();

                $media = Media::create([
                  'bundle' => $file_content['bundle'],
                  'name' => $file_content['file_name'],
                  'field_media_file' => [
                    'target_id' => $file->id(),
                  ],
                ]);

                $media->save();

                $new_activity->opigno_slide_pdf->target_id = $media->id();
                $new_activity->opigno_slide_pdf->display = 1;
              }
              break;

            case 'opigno_video':
              foreach ($activity_content['files'] as $file_key => $file_content) {
                $video_file_path = $temporary_file_path . '/' . $file_key;
                $current_timestamp = \Drupal::time()->getCurrentTime();
                $date = date('Y-m', $current_timestamp);
                $uri = \Drupal::service('file_system')->copy($video_file_path, 'public://video-thumbnails/' . $date . '/' . $file_content['file_name'], FileSystemInterface::EXISTS_RENAME);

                $file = File::Create([
                  'uri' => $uri,
                  'uid' => $this->currentUser()->id(),
                  'status' => $file_content['status'],
                ]);
                $file->save();

                $new_activity->field_video->target_id = $file->id();
              }
              break;

            case 'opigno_h5p':
              $h5p_content_id = $activity_content['opigno_h5p'][0]['h5p_content_id'];
              $file = $folder . "/interactive-content-{$h5p_content_id}.h5p";
              $interface = H5PDrupal::getInstance();

              if ($file) {
                $file_service = \Drupal::service('file_system');
                $dir = $file_service->realpath($temporary_file_path . '/h5p');
                $interface->getUploadedH5pFolderPath($dir);
                $interface->getUploadedH5pPath($folder . "/interactive-content-{$h5p_content_id}.h5p");

                $editor = H5PEditorUtilities::getInstance();
                $h5pEditorAjax = new H5PEditorAjaxImport($editor->ajax->core, $editor, $editor->ajax->storage);

                if ($h5pEditorAjax->isValidPackage(TRUE)) {
                  // Add new libraries from file package.
                  $storage = new H5PStorageImport($h5pEditorAjax->core->h5pF, $h5pEditorAjax->core);

                  // Serialize metadata array in libraries.
                  if (!empty($storage->h5pC->librariesJsonData)) {
                    foreach ($storage->h5pC->librariesJsonData as &$library) {
                      if (array_key_exists('metadataSettings', $library) && is_array($library['metadataSettings'])) {
                        $metadataSettings = serialize($library['metadataSettings']);
                        $library['metadataSettings'] = $metadataSettings;
                      }
                    }
                  }

                  $storage->saveLibraries();

                  $h5p_json = $dir . '/h5p.json';
                  $real_path = \Drupal::service('file_system')->realpath($h5p_json);
                  $h5p_json = file_get_contents($real_path);

                  $format = 'json';
                  $serializer = \Drupal::service('serializer');
                  $h5p_json = $serializer->decode($h5p_json, $format);
                  $dependencies = $h5p_json['preloadedDependencies'];

                  $database = \Drupal::database();

                  // Get ID of main library.
                  foreach ($h5p_json['preloadedDependencies'] as $dependency) {
                    if ($dependency['machineName'] == $h5p_json['mainLibrary']) {
                      $h5p_json['majorVersion'] = $dependency['majorVersion'];
                      $h5p_json['minorVersion'] = $dependency['minorVersion'];
                    }
                  }

                  $query = $database->select('h5p_libraries', 'h_l');
                  $query->condition('machine_name', $h5p_json['mainLibrary'], '=');
                  $query->condition('major_version', $h5p_json['majorVersion'], '=');
                  $query->condition('minor_version', $h5p_json['minorVersion'], '=');
                  $query->fields('h_l', ['library_id']);
                  $query->orderBy('patch_version', 'DESC');
                  $main_library_id = $query->execute()->fetchField();

                  if (!$main_library_id) {
                    $query = $database->select('h5p_libraries', 'h_l');
                    $query->condition('machine_name', $h5p_json['mainLibrary'], '=');
                    $query->fields('h_l', ['library_id']);
                    $query->orderBy('major_version', 'DESC');
                    $query->orderBy('minor_version', 'DESC');
                    $query->orderBy('patch_version', 'DESC');
                    $main_library_id = $query->execute()->fetchField();
                  }

                  $content_json = $dir . '/content/content.json';
                  $real_path = \Drupal::service('file_system')->realpath($content_json);
                  $content_json = file_get_contents($real_path);

                  $fields = [
                    'library_id' => $main_library_id,
                    'title' => $h5p_json['title'],
                    'parameters' => $content_json,
                    'filtered_parameters' => $content_json,
                    'disabled_features' => 0,
                    'authors' => '[]',
                    'changes' => '[]',
                    'license' => 'U',
                  ];

                  $h5p_content = H5PContent::create($fields);
                  $h5p_content->save();
                  $new_activity->set('opigno_h5p', $h5p_content->id());

                  $h5p_dest_path = \Drupal::config('h5p.settings')->get('h5p_default_path');
                  $h5p_dest_path = !empty($h5p_dest_path) ? $h5p_dest_path : 'h5p';

                  $dest_folder = DRUPAL_ROOT . '/sites/default/files/' . $h5p_dest_path . '/content/' . $h5p_content->id();
                  $source_folder = DRUPAL_ROOT . '/sites/default/files/opigno-import/h5p/content/*';
                  \Drupal::service('file_system')->prepareDirectory($dest_folder, FileSystemInterface::MODIFY_PERMISSIONS | FileSystemInterface::CREATE_DIRECTORY);
                  shell_exec('rm ' . $dest_folder . '/content.json');
                  shell_exec('cp -r ' . $source_folder . ' ' . $dest_folder);

                  // Clean up.
                  $h5pEditorAjax->storage->removeTemporarilySavedFiles($h5pEditorAjax->core->h5pF->getUploadedH5pFolderPath());

                  foreach ($dependencies as $dependency_key => $dependency) {
                    $query = $database->select('h5p_libraries', 'h_l');
                    $query->condition('machine_name', $dependency['machineName'], '=');
                    $query->condition('major_version', $dependency['majorVersion'], '=');
                    $query->condition('minor_version', $dependency['minorVersion'], '=');
                    $query->fields('h_l', ['library_id']);
                    $query->orderBy('patch_version', 'DESC');
                    $library_id = $query->execute()->fetchField();

                    if (!$library_id) {
                      $query = $database->select('h5p_libraries', 'h_l');
                      $query->condition('machine_name', $dependency['machineName'], '=');
                      $query->fields('h_l', ['library_id']);
                      $query->orderBy('major_version', 'DESC');
                      $query->orderBy('minor_version', 'DESC');
                      $query->orderBy('patch_version', 'DESC');
                      $library_id = $query->execute()->fetchField();
                    }

                    if ($h5p_json['mainLibrary'] == $dependency['machineName']) {
                      $main_library_values = [
                        'content_id' => $h5p_content->id(),
                        'library_id' => $library_id,
                        'dependency_type' => 'preloaded',
                        'drop_css' => 0,
                        'weight' => count($dependencies) + 1,
                      ];

                      continue;
                    }

                    if ($library_id) {
                      $database->insert('h5p_content_libraries')
                        ->fields([
                          'content_id',
                          'library_id',
                          'dependency_type',
                          'drop_css',
                          'weight',
                        ])
                        ->values([
                          'content_id' => $h5p_content->id(),
                          'library_id' => $library_id,
                          'dependency_type' => 'preloaded',
                          'drop_css' => 0,
                          'weight' => $dependency_key + 1,
                        ])
                        ->execute();
                    }
                  }

                  if (!empty($main_library_values)) {
                    $database->insert('h5p_content_libraries')
                      ->fields([
                        'content_id',
                        'library_id',
                        'dependency_type',
                        'drop_css',
                        'weight',
                      ])
                      ->values($main_library_values)
                      ->execute();
                  }
                }
              }
              break;
          }

          $new_activity->save();

          $ids['activities'][$activity_content['id'][0]['value']] = $new_activity->id();
          $add_activities[] = $new_activity;
        }

        foreach ($parent_links as $link) {
          if ($link['required_activities']) {
            foreach ($link['required_activities'] as $key_req => $require_string) {
              $require = explode('-', $require_string);
              $link['required_activities'][$key_req] = str_replace($require[0], $ids['activities'][$require[0]], $link['required_activities'][$key_req]);
            }

            $link['required_activities'] = serialize($link['required_activities']);
          }
          else {
            $link['required_activities'] = NULL;
          }

          OpignoGroupManagedLink::createWithValues(
            $new_course->id(),
            $ids['link'][$link['parent_content_id']],
            $new_content->id(),
            $link['required_score'],
            $link['required_activities']
          )->save();
        }

        $opigno_module_obj = \Drupal::service('opigno_module.opigno_module');
        $opigno_module_obj->activitiesToModule($add_activities, $new_module);
      }

      $route_parameters = [
        'group' => $new_course->id(),
      ];

      \Drupal::messenger()->addMessage(t('Imported course %course', [
        '%course' => Link::createFromRoute($new_course->label(), 'entity.group.canonical', $route_parameters)->toString()
      ]));

      $form_state->setRedirect('entity.group.collection');
    }
  }

}
