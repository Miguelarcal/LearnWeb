<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/block' => [[['_route' => 'app_block_index', '_controller' => 'App\\Controller\\BlockController::index'], null, ['GET' => 0], null, true, false, null]],
        '/block/new' => [[['_route' => 'app_block_new', '_controller' => 'App\\Controller\\BlockController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/course' => [[['_route' => 'app_course_index', '_controller' => 'App\\Controller\\CourseController::index'], null, ['GET' => 0], null, true, false, null]],
        '/course/new' => [[['_route' => 'app_course_new', '_controller' => 'App\\Controller\\CourseController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/label' => [[['_route' => 'app_label_index', '_controller' => 'App\\Controller\\LabelController::index'], null, ['GET' => 0], null, true, false, null]],
        '/label/new' => [[['_route' => 'app_label_new', '_controller' => 'App\\Controller\\LabelController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/language' => [[['_route' => 'app_language_index', '_controller' => 'App\\Controller\\LanguageController::index'], null, ['GET' => 0], null, true, false, null]],
        '/language/new' => [[['_route' => 'app_language_new', '_controller' => 'App\\Controller\\LanguageController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/page' => [[['_route' => 'app_page_index', '_controller' => 'App\\Controller\\PageController::index'], null, ['GET' => 0], null, true, false, null]],
        '/page/new' => [[['_route' => 'app_page_new', '_controller' => 'App\\Controller\\PageController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/tutorial' => [[['_route' => 'app_tutorial_index', '_controller' => 'App\\Controller\\TutorialController::index'], null, ['GET' => 0], null, true, false, null]],
        '/tutorial/new' => [[['_route' => 'app_tutorial_new', '_controller' => 'App\\Controller\\TutorialController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/tutorial/in/course' => [[['_route' => 'app_tutorial_in_course_index', '_controller' => 'App\\Controller\\TutorialInCourseController::index'], null, ['GET' => 0], null, true, false, null]],
        '/tutorial/in/course/new' => [[['_route' => 'app_tutorial_in_course_new', '_controller' => 'App\\Controller\\TutorialInCourseController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/user' => [[['_route' => 'app_user_index', '_controller' => 'App\\Controller\\UserController::index'], null, ['GET' => 0], null, true, false, null]],
        '/user/new' => [[['_route' => 'app_user_new', '_controller' => 'App\\Controller\\UserController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api(?'
                    .'|/(?'
                        .'|\\.well\\-known/genid/([^/]++)(*:46)'
                        .'|errors(?:/(\\d+))?(*:70)'
                        .'|validation_errors/([^/]++)(*:103)'
                    .')'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:140)'
                    .'|/(?'
                        .'|docs(?:\\.([^/]++))?(*:171)'
                        .'|co(?'
                            .'|ntexts/([^.]+)(?:\\.(jsonld))?(*:213)'
                            .'|urses(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:255)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:281)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:319)'
                                .')'
                            .')'
                        .')'
                        .'|validation_errors/([^/]++)(?'
                            .'|(*:359)'
                        .')'
                        .'|blocks(?'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:403)'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:429)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:467)'
                            .')'
                        .')'
                        .'|la(?'
                            .'|bels(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:515)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:541)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:579)'
                                .')'
                            .')'
                            .'|nguages(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:625)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:651)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:689)'
                                .')'
                            .')'
                        .')'
                        .'|pages(?'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:734)'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:760)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:798)'
                            .')'
                        .')'
                        .'|tutorial(?'
                            .'|s(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:849)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:875)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:913)'
                                .')'
                            .')'
                            .'|_in_courses(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:963)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:989)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1027)'
                                .')'
                            .')'
                        .')'
                        .'|users(?'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1073)'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1100)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1139)'
                            .')'
                        .')'
                    .')'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:1180)'
                .'|/block/([^/]++)(?'
                    .'|(*:1207)'
                    .'|/edit(*:1221)'
                    .'|(*:1230)'
                .')'
                .'|/course/([^/]++)(?'
                    .'|(*:1259)'
                    .'|/edit(*:1273)'
                    .'|(*:1282)'
                .')'
                .'|/la(?'
                    .'|bel/([^/]++)(?'
                        .'|(*:1313)'
                        .'|/edit(*:1327)'
                        .'|(*:1336)'
                    .')'
                    .'|nguage/([^/]++)(?'
                        .'|(*:1364)'
                        .'|/edit(*:1378)'
                        .'|(*:1387)'
                    .')'
                .')'
                .'|/page/([^/]++)(?'
                    .'|(*:1415)'
                    .'|/edit(*:1429)'
                    .'|(*:1438)'
                .')'
                .'|/tutorial/(?'
                    .'|([^/]++)(?'
                        .'|(*:1472)'
                        .'|/edit(*:1486)'
                        .'|(*:1495)'
                    .')'
                    .'|in/course/([^/]++)(?'
                        .'|(*:1526)'
                        .'|/edit(*:1540)'
                        .'|(*:1549)'
                    .')'
                .')'
                .'|/user/([^/]++)(?'
                    .'|(*:1577)'
                    .'|/edit(*:1591)'
                    .'|(*:1600)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        46 => [[['_route' => 'api_genid', '_controller' => 'api_platform.action.not_exposed', '_api_respond' => 'true'], ['id'], null, null, false, true, null]],
        70 => [[['_route' => 'api_errors', '_controller' => 'api_platform.action.not_exposed', 'status' => '500'], ['status'], null, null, false, true, null]],
        103 => [[['_route' => 'api_validation_errors', '_controller' => 'api_platform.action.not_exposed'], ['id'], null, null, false, true, null]],
        140 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        171 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        213 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        255 => [[['_route' => '_api_/courses/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Course', '_api_operation_name' => '_api_/courses/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        281 => [
            [['_route' => '_api_/courses{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Course', '_api_operation_name' => '_api_/courses{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/courses{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Course', '_api_operation_name' => '_api_/courses{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        319 => [
            [['_route' => '_api_/courses/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Course', '_api_operation_name' => '_api_/courses/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/courses/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Course', '_api_operation_name' => '_api_/courses/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/courses/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Course', '_api_operation_name' => '_api_/courses/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        359 => [
            [['_route' => '_api_validation_errors_problem', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_problem'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_validation_errors_hydra', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_hydra'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_validation_errors_jsonapi', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_jsonapi'], ['id'], ['GET' => 0], null, false, true, null],
        ],
        403 => [[['_route' => '_api_/blocks/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Block', '_api_operation_name' => '_api_/blocks/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        429 => [
            [['_route' => '_api_/blocks{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Block', '_api_operation_name' => '_api_/blocks{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/blocks{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Block', '_api_operation_name' => '_api_/blocks{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        467 => [
            [['_route' => '_api_/blocks/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Block', '_api_operation_name' => '_api_/blocks/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/blocks/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Block', '_api_operation_name' => '_api_/blocks/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/blocks/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Block', '_api_operation_name' => '_api_/blocks/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        515 => [[['_route' => '_api_/labels/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Label', '_api_operation_name' => '_api_/labels/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        541 => [
            [['_route' => '_api_/labels{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Label', '_api_operation_name' => '_api_/labels{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/labels{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Label', '_api_operation_name' => '_api_/labels{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        579 => [
            [['_route' => '_api_/labels/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Label', '_api_operation_name' => '_api_/labels/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/labels/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Label', '_api_operation_name' => '_api_/labels/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/labels/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Label', '_api_operation_name' => '_api_/labels/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        625 => [[['_route' => '_api_/languages/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Language', '_api_operation_name' => '_api_/languages/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        651 => [
            [['_route' => '_api_/languages{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Language', '_api_operation_name' => '_api_/languages{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/languages{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Language', '_api_operation_name' => '_api_/languages{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        689 => [
            [['_route' => '_api_/languages/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Language', '_api_operation_name' => '_api_/languages/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/languages/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Language', '_api_operation_name' => '_api_/languages/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/languages/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Language', '_api_operation_name' => '_api_/languages/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        734 => [[['_route' => '_api_/pages/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Page', '_api_operation_name' => '_api_/pages/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        760 => [
            [['_route' => '_api_/pages{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Page', '_api_operation_name' => '_api_/pages{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/pages{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Page', '_api_operation_name' => '_api_/pages{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        798 => [
            [['_route' => '_api_/pages/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Page', '_api_operation_name' => '_api_/pages/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/pages/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Page', '_api_operation_name' => '_api_/pages/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/pages/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Page', '_api_operation_name' => '_api_/pages/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        849 => [[['_route' => '_api_/tutorials/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Tutorial', '_api_operation_name' => '_api_/tutorials/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        875 => [
            [['_route' => '_api_/tutorials{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Tutorial', '_api_operation_name' => '_api_/tutorials{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/tutorials{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Tutorial', '_api_operation_name' => '_api_/tutorials{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        913 => [
            [['_route' => '_api_/tutorials/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Tutorial', '_api_operation_name' => '_api_/tutorials/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/tutorials/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Tutorial', '_api_operation_name' => '_api_/tutorials/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/tutorials/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Tutorial', '_api_operation_name' => '_api_/tutorials/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        963 => [[['_route' => '_api_/tutorial_in_courses/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\TutorialInCourse', '_api_operation_name' => '_api_/tutorial_in_courses/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        989 => [
            [['_route' => '_api_/tutorial_in_courses{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\TutorialInCourse', '_api_operation_name' => '_api_/tutorial_in_courses{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/tutorial_in_courses{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\TutorialInCourse', '_api_operation_name' => '_api_/tutorial_in_courses{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1027 => [
            [['_route' => '_api_/tutorial_in_courses/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\TutorialInCourse', '_api_operation_name' => '_api_/tutorial_in_courses/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/tutorial_in_courses/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\TutorialInCourse', '_api_operation_name' => '_api_/tutorial_in_courses/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/tutorial_in_courses/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\TutorialInCourse', '_api_operation_name' => '_api_/tutorial_in_courses/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1073 => [[['_route' => '_api_/users/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1100 => [
            [['_route' => '_api_/users{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/users{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1139 => [
            [['_route' => '_api_/users/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/users/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/users/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1180 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        1207 => [[['_route' => 'app_block_show', '_controller' => 'App\\Controller\\BlockController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        1221 => [[['_route' => 'app_block_edit', '_controller' => 'App\\Controller\\BlockController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1230 => [[['_route' => 'app_block_delete', '_controller' => 'App\\Controller\\BlockController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        1259 => [[['_route' => 'app_course_show', '_controller' => 'App\\Controller\\CourseController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        1273 => [[['_route' => 'app_course_edit', '_controller' => 'App\\Controller\\CourseController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1282 => [[['_route' => 'app_course_delete', '_controller' => 'App\\Controller\\CourseController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        1313 => [[['_route' => 'app_label_show', '_controller' => 'App\\Controller\\LabelController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        1327 => [[['_route' => 'app_label_edit', '_controller' => 'App\\Controller\\LabelController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1336 => [[['_route' => 'app_label_delete', '_controller' => 'App\\Controller\\LabelController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        1364 => [[['_route' => 'app_language_show', '_controller' => 'App\\Controller\\LanguageController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        1378 => [[['_route' => 'app_language_edit', '_controller' => 'App\\Controller\\LanguageController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1387 => [[['_route' => 'app_language_delete', '_controller' => 'App\\Controller\\LanguageController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        1415 => [[['_route' => 'app_page_show', '_controller' => 'App\\Controller\\PageController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        1429 => [[['_route' => 'app_page_edit', '_controller' => 'App\\Controller\\PageController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1438 => [[['_route' => 'app_page_delete', '_controller' => 'App\\Controller\\PageController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        1472 => [[['_route' => 'app_tutorial_show', '_controller' => 'App\\Controller\\TutorialController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        1486 => [[['_route' => 'app_tutorial_edit', '_controller' => 'App\\Controller\\TutorialController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1495 => [[['_route' => 'app_tutorial_delete', '_controller' => 'App\\Controller\\TutorialController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        1526 => [[['_route' => 'app_tutorial_in_course_show', '_controller' => 'App\\Controller\\TutorialInCourseController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        1540 => [[['_route' => 'app_tutorial_in_course_edit', '_controller' => 'App\\Controller\\TutorialInCourseController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1549 => [[['_route' => 'app_tutorial_in_course_delete', '_controller' => 'App\\Controller\\TutorialInCourseController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        1577 => [[['_route' => 'app_user_show', '_controller' => 'App\\Controller\\UserController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        1591 => [[['_route' => 'app_user_edit', '_controller' => 'App\\Controller\\UserController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1600 => [
            [['_route' => 'app_user_delete', '_controller' => 'App\\Controller\\UserController::delete'], ['id'], ['POST' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
