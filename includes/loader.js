// External Dependencies
import $ from 'jquery';

// Internal Dependencies
import modules from './modules';
import fields from './fields';

$(window).on('et_builder_api_ready', (event, API) => {
  API.registerModules(modules);
  API.registerModalFields(fields);
});


$.ready(function ($) {
  // Initialize Select2 on the select input
  $('.et-fb-selected_categories_select2').select2();
});

// jQuery(document).ready(function ($) {
//   // Target your select element and call Select2
//   $('#your-select-element-id').select2();
// });
