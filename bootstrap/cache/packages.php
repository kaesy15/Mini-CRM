<?php return array (
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'laravelcollective/html' => 
  array (
    'providers' => 
    array (
      0 => 'Collective\\Html\\HtmlServiceProvider',
    ),
    'aliases' => 
    array (
      'Form' => 'Collective\\Html\\FormFacade',
      'Html' => 'Collective\\Html\\HtmlFacade',
    ),
  ),
  'luthfi/formfield' => 
  array (
    'providers' => 
    array (
      0 => 'Luthfi\\FormField\\FormFieldServiceProvider',
    ),
    'aliases' => 
    array (
      'FormField' => 'Luthfi\\FormField\\FormFieldFacade',
      'Form' => 'Collective\\Html\\FormFacade',
      'Html' => 'Collective\\Html\\HtmlFacade',
    ),
  ),
  'luthfi/simple-crud-generator' => 
  array (
    'providers' => 
    array (
      0 => 'Luthfi\\CrudGenerator\\ServiceProvider',
    ),
  ),
);