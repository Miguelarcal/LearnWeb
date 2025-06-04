<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/newpage' => [[['_route' => 'app_page_new_v2', '_controller' => 'App\\Controller\\ApiController::pages_new_v2'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/newblock' => [[['_route' => 'app_block_new_v2', '_controller' => 'App\\Controller\\ApiController::block_new_v2'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/tutorialsavaidable' => [[['_route' => 'app_tutorials_avaidable', '_controller' => 'App\\Controller\\ApiController::tutorials_avaidable'], null, ['GET' => 0], null, false, false, null]],
        '/api/newtutorial' => [[['_route' => 'app_tutorial_new_v2', '_controller' => 'App\\Controller\\ApiController::tutorial_new_v2'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/newcourse' => [[['_route' => 'app_course_new_v2', '_controller' => 'App\\Controller\\ApiController::course_new_v2'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/newtutorialincourse' => [[['_route' => 'app_tutorial_in_course_new_v2', '_controller' => 'App\\Controller\\ApiController::tutorial_in_course_new_v2'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/coursessavaidable' => [[['_route' => 'app_courses_avaidable', '_controller' => 'App\\Controller\\ApiController::courses_avaidable'], null, ['GET' => 0], null, false, false, null]],
        '/api/getalltutorials' => [[['_route' => 'app_tutorial_all', '_controller' => 'App\\Controller\\ApiController::tutorial_all'], null, ['GET' => 0], null, false, false, null]],
        '/api/getallcourses' => [[['_route' => 'app_courses_all', '_controller' => 'App\\Controller\\ApiController::courses_all'], null, ['GET' => 0], null, false, false, null]],
        '/api/newtutorialscore' => [[['_route' => 'app_tutorialscore_new', '_controller' => 'App\\Controller\\ApiController::tutorialscore_new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/newcoursescore' => [[['_route' => 'app_coursescore_new', '_controller' => 'App\\Controller\\ApiController::coursescore_new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/block' => [[['_route' => 'app_block_index', '_controller' => 'App\\Controller\\BlockController::index'], null, ['GET' => 0], null, true, false, null]],
        '/block/new' => [[['_route' => 'app_block_new', '_controller' => 'App\\Controller\\BlockController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/course' => [[['_route' => 'app_course_index', '_controller' => 'App\\Controller\\CourseController::index'], null, ['GET' => 0], null, true, false, null]],
        '/course/new' => [[['_route' => 'app_course_new', '_controller' => 'App\\Controller\\CourseController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
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
                        .'|c(?'
                            .'|o(?'
                                .'|ntexts/([^.]+)(?:\\.(jsonld))?(*:216)'
                                .'|urse(?'
                                    .'|s(?'
                                        .'|/([^/\\.]++)(?:\\.([^/]++))?(*:261)'
                                        .'|(?:\\.([^/]++))?(?'
                                            .'|(*:287)'
                                        .')'
                                        .'|/(?'
                                            .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                                .'|(*:328)'
                                            .')'
                                            .'|filter/([^/]++)/([^/]++)/([^/]++)/([^/]++)/([^/]++)/([^/]++)(*:397)'
                                        .')'
                                    .')'
                                    .'|_scores/([^/\\.]++)(?:\\.([^/]++))?(*:440)'
                                .')'
                            .')'
                            .'|hange(?'
                                .'|hidden(?'
                                    .'|tutorial/([^/]++)(*:484)'
                                    .'|course/([^/]++)(*:507)'
                                .')'
                                .'|banuser/([^/]++)(*:532)'
                            .')'
                        .')'
                        .'|validation_errors/([^/]++)(?'
                            .'|(*:571)'
                        .')'
                        .'|blocks(?'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:615)'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:641)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:679)'
                            .')'
                        .')'
                        .'|pages(?'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:723)'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:749)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:787)'
                            .')'
                        .')'
                        .'|tutorial(?'
                            .'|s(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:838)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:864)'
                                .')'
                                .'|/(?'
                                    .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:905)'
                                    .')'
                                    .'|filter/([^/]++)/([^/]++)/([^/]++)/([^/]++)/([^/]++)(*:965)'
                                .')'
                                .'|filteredavaidable/([^/]++)(*:1000)'
                            .')'
                            .'|_(?'
                                .'|in_courses(?'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1053)'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:1080)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:1119)'
                                    .')'
                                .')'
                                .'|scores/([^/\\.]++)(?:\\.([^/]++))?(*:1162)'
                            .')'
                        .')'
                        .'|u(?'
                            .'|sers(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1210)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1237)'
                                .')'
                                .'|/(?'
                                    .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:1279)'
                                    .')'
                                    .'|validate/([^/]++)(*:1306)'
                                    .'|([^/]++)(*:1323)'
                                    .'|login/([^/]++)/([^/]++)(*:1355)'
                                    .'|check/([^/]++)/([^/]++)(*:1387)'
                                    .'|isbanned/([^/]++)(*:1413)'
                                    .'|register(?'
                                        .'|/([^/]++)/([^/]++)/([^/]++)(*:1460)'
                                        .'|admin/([^/]++)/([^/]++)/([^/]++)(*:1501)'
                                    .')'
                                .')'
                            .')'
                            .'|pdate(?'
                                .'|tutorial(?'
                                    .'|/([^/]++)(*:1541)'
                                    .'|score/([^/]++)/([^/]++)(*:1573)'
                                .')'
                                .'|course(?'
                                    .'|/([^/]++)(*:1601)'
                                    .'|score/([^/]++)/([^/]++)(*:1633)'
                                .')'
                            .')'
                        .')'
                        .'|get(?'
                            .'|my(?'
                                .'|tutorials/([^/]++)(*:1674)'
                                .'|courses/([^/]++)(*:1699)'
                            .')'
                            .'|tutorialsfromcourse/([^/]++)(*:1737)'
                            .'|a(?'
                                .'|tutorialscore/([^/]++)/([^/]++)(*:1781)'
                                .'|coursescore/([^/]++)/([^/]++)(*:1819)'
                            .')'
                        .')'
                        .'|average(?'
                            .'|tutorialscore/([^/]++)(*:1862)'
                            .'|coursescore/([^/]++)(*:1891)'
                        .')'
                    .')'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:1931)'
                .'|/block/([^/]++)(?'
                    .'|(*:1958)'
                    .'|/edit(*:1972)'
                    .'|(*:1981)'
                .')'
                .'|/course/([^/]++)(?'
                    .'|(*:2010)'
                    .'|/edit(*:2024)'
                    .'|(*:2033)'
                .')'
                .'|/page/([^/]++)(?'
                    .'|(*:2060)'
                    .'|/edit(*:2074)'
                    .'|(*:2083)'
                .')'
                .'|/tutorial/(?'
                    .'|([^/]++)(?'
                        .'|(*:2117)'
                        .'|/edit(*:2131)'
                        .'|(*:2140)'
                    .')'
                    .'|in/course/([^/]++)(?'
                        .'|(*:2171)'
                        .'|/edit(*:2185)'
                        .'|(*:2194)'
                    .')'
                .')'
                .'|/user/([^/]++)(?'
                    .'|(*:2222)'
                    .'|/edit(*:2236)'
                    .'|(*:2245)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        46 => [[['_route' => 'api_genid', '_controller' => 'api_platform.action.not_exposed', '_api_respond' => 'true'], ['id'], null, null, false, true, null]],
        70 => [[['_route' => 'api_errors', '_controller' => 'api_platform.action.not_exposed', 'status' => '500'], ['status'], null, null, false, true, null]],
        103 => [[['_route' => 'api_validation_errors', '_controller' => 'api_platform.action.not_exposed'], ['id'], null, null, false, true, null]],
        140 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        171 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        216 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        261 => [[['_route' => '_api_/courses/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Course', '_api_operation_name' => '_api_/courses/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        287 => [
            [['_route' => '_api_/courses{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Course', '_api_operation_name' => '_api_/courses{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/courses{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Course', '_api_operation_name' => '_api_/courses{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        328 => [
            [['_route' => '_api_/courses/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Course', '_api_operation_name' => '_api_/courses/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/courses/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Course', '_api_operation_name' => '_api_/courses/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/courses/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Course', '_api_operation_name' => '_api_/courses/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        397 => [[['_route' => 'app_courses_filter', '_controller' => 'App\\Controller\\ApiController::filterCourses'], ['text', 'min_rating', 'max_rating', 'difficulty', 'sort', 'hidden'], ['GET' => 0], null, false, true, null]],
        440 => [[['_route' => '_api_/course_scores/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\CourseScore', '_api_operation_name' => '_api_/course_scores/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        484 => [[['_route' => 'app_tutorial_update_hidden', '_controller' => 'App\\Controller\\ApiController::tutorial_change_hidden'], ['id'], ['GET' => 0, 'PUT' => 1], null, false, true, null]],
        507 => [[['_route' => 'app_course_update_hidden', '_controller' => 'App\\Controller\\ApiController::course_change_hidden'], ['id'], ['GET' => 0, 'PUT' => 1], null, false, true, null]],
        532 => [[['_route' => 'app_user_update_ban', '_controller' => 'App\\Controller\\ApiController::user_change_ban'], ['id'], ['GET' => 0, 'PUT' => 1], null, false, true, null]],
        571 => [
            [['_route' => '_api_validation_errors_problem', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_problem'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_validation_errors_hydra', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_hydra'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_validation_errors_jsonapi', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_jsonapi'], ['id'], ['GET' => 0], null, false, true, null],
        ],
        615 => [[['_route' => '_api_/blocks/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Block', '_api_operation_name' => '_api_/blocks/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        641 => [
            [['_route' => '_api_/blocks{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Block', '_api_operation_name' => '_api_/blocks{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/blocks{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Block', '_api_operation_name' => '_api_/blocks{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        679 => [
            [['_route' => '_api_/blocks/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Block', '_api_operation_name' => '_api_/blocks/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/blocks/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Block', '_api_operation_name' => '_api_/blocks/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/blocks/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Block', '_api_operation_name' => '_api_/blocks/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        723 => [[['_route' => '_api_/pages/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Page', '_api_operation_name' => '_api_/pages/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        749 => [
            [['_route' => '_api_/pages{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Page', '_api_operation_name' => '_api_/pages{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/pages{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Page', '_api_operation_name' => '_api_/pages{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        787 => [
            [['_route' => '_api_/pages/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Page', '_api_operation_name' => '_api_/pages/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/pages/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Page', '_api_operation_name' => '_api_/pages/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/pages/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Page', '_api_operation_name' => '_api_/pages/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        838 => [[['_route' => '_api_/tutorials/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Tutorial', '_api_operation_name' => '_api_/tutorials/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        864 => [
            [['_route' => '_api_/tutorials{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Tutorial', '_api_operation_name' => '_api_/tutorials{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/tutorials{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Tutorial', '_api_operation_name' => '_api_/tutorials{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        905 => [
            [['_route' => '_api_/tutorials/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Tutorial', '_api_operation_name' => '_api_/tutorials/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/tutorials/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Tutorial', '_api_operation_name' => '_api_/tutorials/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/tutorials/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Tutorial', '_api_operation_name' => '_api_/tutorials/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        965 => [[['_route' => 'app_tutorials_filter', '_controller' => 'App\\Controller\\ApiController::filterTutorials'], ['text', 'min_rating', 'max_rating', 'sort', 'hidden'], ['GET' => 0], null, false, true, null]],
        1000 => [[['_route' => 'app_tutorials_filtered_avaidable', '_controller' => 'App\\Controller\\ApiController::tutorials_filtered_avaidable'], ['texto'], ['GET' => 0], null, false, true, null]],
        1053 => [[['_route' => '_api_/tutorial_in_courses/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\TutorialInCourse', '_api_operation_name' => '_api_/tutorial_in_courses/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1080 => [
            [['_route' => '_api_/tutorial_in_courses{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\TutorialInCourse', '_api_operation_name' => '_api_/tutorial_in_courses{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/tutorial_in_courses{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\TutorialInCourse', '_api_operation_name' => '_api_/tutorial_in_courses{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1119 => [
            [['_route' => '_api_/tutorial_in_courses/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\TutorialInCourse', '_api_operation_name' => '_api_/tutorial_in_courses/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/tutorial_in_courses/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\TutorialInCourse', '_api_operation_name' => '_api_/tutorial_in_courses/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/tutorial_in_courses/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\TutorialInCourse', '_api_operation_name' => '_api_/tutorial_in_courses/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1162 => [[['_route' => '_api_/tutorial_scores/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\TutorialScore', '_api_operation_name' => '_api_/tutorial_scores/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1210 => [[['_route' => '_api_/users/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1237 => [
            [['_route' => '_api_/users{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/users{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1279 => [
            [['_route' => '_api_/users/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/users/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/users/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1306 => [[['_route' => 'app_user_validate', '_controller' => 'App\\Controller\\ApiController::validate'], ['nickname'], ['GET' => 0], null, false, true, null]],
        1323 => [[['_route' => 'app_get_user_by_id', '_controller' => 'App\\Controller\\ApiController::get_user_by_id'], ['id'], ['GET' => 0], null, false, true, null]],
        1355 => [[['_route' => 'app_user_login', '_controller' => 'App\\Controller\\ApiController::login'], ['nickname', 'passwd'], ['GET' => 0], null, false, true, null]],
        1387 => [[['_route' => 'app_user_check_existence', '_controller' => 'App\\Controller\\ApiController::check_existence'], ['nickname', 'email'], ['GET' => 0], null, false, true, null]],
        1413 => [[['_route' => 'app_user_check_banned', '_controller' => 'App\\Controller\\ApiController::check_banned'], ['id'], ['GET' => 0], null, false, true, null]],
        1460 => [[['_route' => 'app_user_register', '_controller' => 'App\\Controller\\ApiController::register'], ['nickname', 'email', 'passwd'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        1501 => [[['_route' => 'app_user_registeradmin', '_controller' => 'App\\Controller\\ApiController::registeradmin'], ['nickname', 'email', 'passwd'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        1541 => [[['_route' => 'app_tutorial_update', '_controller' => 'App\\Controller\\ApiController::tutorial_update'], ['id'], ['GET' => 0, 'PUT' => 1], null, false, true, null]],
        1573 => [[['_route' => 'app_tutorialscore_update', '_controller' => 'App\\Controller\\ApiController::tutorialscore_update'], ['tutorial_id', 'user_id'], ['GET' => 0, 'PUT' => 1], null, false, true, null]],
        1601 => [[['_route' => 'app_course_update', '_controller' => 'App\\Controller\\ApiController::course_update'], ['id'], ['GET' => 0, 'PUT' => 1], null, false, true, null]],
        1633 => [[['_route' => 'app_coursescore_update', '_controller' => 'App\\Controller\\ApiController::coursescore_update'], ['course_id', 'user_id'], ['GET' => 0, 'PUT' => 1], null, false, true, null]],
        1674 => [[['_route' => 'app_tutorial_mine', '_controller' => 'App\\Controller\\ApiController::tutorial_mine'], ['id'], ['GET' => 0], null, false, true, null]],
        1699 => [[['_route' => 'app_course_mine', '_controller' => 'App\\Controller\\ApiController::course_mine'], ['id'], ['GET' => 0], null, false, true, null]],
        1737 => [[['_route' => 'app_tutorials_from_course', '_controller' => 'App\\Controller\\ApiController::tutorial_from_course'], ['id'], ['GET' => 0], null, false, true, null]],
        1781 => [[['_route' => 'app_get_a_tutorial_score', '_controller' => 'App\\Controller\\ApiController::get_a_tutorial_score'], ['tutorial_id', 'user_id'], ['GET' => 0], null, false, true, null]],
        1819 => [[['_route' => 'app_get_a_course_score', '_controller' => 'App\\Controller\\ApiController::get_a_course_score'], ['course_id', 'user_id'], ['GET' => 0], null, false, true, null]],
        1862 => [[['_route' => 'app_average_tutorial_score', '_controller' => 'App\\Controller\\ApiController::average_tutorial_score'], ['tutorial_id'], ['GET' => 0], null, false, true, null]],
        1891 => [[['_route' => 'app_average_course_score', '_controller' => 'App\\Controller\\ApiController::average_course_score'], ['course_id'], ['GET' => 0], null, false, true, null]],
        1931 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        1958 => [[['_route' => 'app_block_show', '_controller' => 'App\\Controller\\BlockController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        1972 => [[['_route' => 'app_block_edit', '_controller' => 'App\\Controller\\BlockController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1981 => [[['_route' => 'app_block_delete', '_controller' => 'App\\Controller\\BlockController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        2010 => [[['_route' => 'app_course_show', '_controller' => 'App\\Controller\\CourseController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        2024 => [[['_route' => 'app_course_edit', '_controller' => 'App\\Controller\\CourseController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        2033 => [[['_route' => 'app_course_delete', '_controller' => 'App\\Controller\\CourseController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        2060 => [[['_route' => 'app_page_show', '_controller' => 'App\\Controller\\PageController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        2074 => [[['_route' => 'app_page_edit', '_controller' => 'App\\Controller\\PageController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        2083 => [[['_route' => 'app_page_delete', '_controller' => 'App\\Controller\\PageController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        2117 => [[['_route' => 'app_tutorial_show', '_controller' => 'App\\Controller\\TutorialController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        2131 => [[['_route' => 'app_tutorial_edit', '_controller' => 'App\\Controller\\TutorialController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        2140 => [[['_route' => 'app_tutorial_delete', '_controller' => 'App\\Controller\\TutorialController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        2171 => [[['_route' => 'app_tutorial_in_course_show', '_controller' => 'App\\Controller\\TutorialInCourseController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        2185 => [[['_route' => 'app_tutorial_in_course_edit', '_controller' => 'App\\Controller\\TutorialInCourseController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        2194 => [[['_route' => 'app_tutorial_in_course_delete', '_controller' => 'App\\Controller\\TutorialInCourseController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        2222 => [[['_route' => 'app_user_show', '_controller' => 'App\\Controller\\UserController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        2236 => [[['_route' => 'app_user_edit', '_controller' => 'App\\Controller\\UserController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        2245 => [
            [['_route' => 'app_user_delete', '_controller' => 'App\\Controller\\UserController::delete'], ['id'], ['POST' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
