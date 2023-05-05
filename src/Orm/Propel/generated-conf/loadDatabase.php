<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->initDatabaseMapFromDumps(array (
  'zed' => 
  array (
    'tablesByName' => 
    array (
      'spy_currency' => '\\Orm\\Zed\\Currency\\Persistence\\Map\\SpyCurrencyTableMap',
      'spy_currency_store' => '\\Orm\\Zed\\Currency\\Persistence\\Map\\SpyCurrencyStoreTableMap',
      'spy_event_behavior_entity_change' => '\\Orm\\Zed\\EventBehavior\\Persistence\\Map\\SpyEventBehaviorEntityChangeTableMap',
      'spy_glossary_key' => '\\Orm\\Zed\\Glossary\\Persistence\\Map\\SpyGlossaryKeyTableMap',
      'spy_glossary_storage' => '\\Orm\\Zed\\GlossaryStorage\\Persistence\\Map\\SpyGlossaryStorageTableMap',
      'spy_glossary_translation' => '\\Orm\\Zed\\Glossary\\Persistence\\Map\\SpyGlossaryTranslationTableMap',
      'spy_locale' => '\\Orm\\Zed\\Locale\\Persistence\\Map\\SpyLocaleTableMap',
      'spy_locale_store' => '\\Orm\\Zed\\Locale\\Persistence\\Map\\SpyLocaleStoreTableMap',
      'spy_queue_process' => '\\Orm\\Zed\\Queue\\Persistence\\Map\\SpyQueueProcessTableMap',
      'spy_store' => '\\Orm\\Zed\\Store\\Persistence\\Map\\SpyStoreTableMap',
      'spy_touch' => '\\Orm\\Zed\\Touch\\Persistence\\Map\\SpyTouchTableMap',
      'spy_touch_search' => '\\Orm\\Zed\\Touch\\Persistence\\Map\\SpyTouchSearchTableMap',
      'spy_touch_storage' => '\\Orm\\Zed\\Touch\\Persistence\\Map\\SpyTouchStorageTableMap',
    ),
    'tablesByPhpName' => 
    array (
      '\\SpyCurrency' => '\\Orm\\Zed\\Currency\\Persistence\\Map\\SpyCurrencyTableMap',
      '\\SpyCurrencyStore' => '\\Orm\\Zed\\Currency\\Persistence\\Map\\SpyCurrencyStoreTableMap',
      '\\SpyEventBehaviorEntityChange' => '\\Orm\\Zed\\EventBehavior\\Persistence\\Map\\SpyEventBehaviorEntityChangeTableMap',
      '\\SpyGlossaryKey' => '\\Orm\\Zed\\Glossary\\Persistence\\Map\\SpyGlossaryKeyTableMap',
      '\\SpyGlossaryStorage' => '\\Orm\\Zed\\GlossaryStorage\\Persistence\\Map\\SpyGlossaryStorageTableMap',
      '\\SpyGlossaryTranslation' => '\\Orm\\Zed\\Glossary\\Persistence\\Map\\SpyGlossaryTranslationTableMap',
      '\\SpyLocale' => '\\Orm\\Zed\\Locale\\Persistence\\Map\\SpyLocaleTableMap',
      '\\SpyLocaleStore' => '\\Orm\\Zed\\Locale\\Persistence\\Map\\SpyLocaleStoreTableMap',
      '\\SpyQueueProcess' => '\\Orm\\Zed\\Queue\\Persistence\\Map\\SpyQueueProcessTableMap',
      '\\SpyStore' => '\\Orm\\Zed\\Store\\Persistence\\Map\\SpyStoreTableMap',
      '\\SpyTouch' => '\\Orm\\Zed\\Touch\\Persistence\\Map\\SpyTouchTableMap',
      '\\SpyTouchSearch' => '\\Orm\\Zed\\Touch\\Persistence\\Map\\SpyTouchSearchTableMap',
      '\\SpyTouchStorage' => '\\Orm\\Zed\\Touch\\Persistence\\Map\\SpyTouchStorageTableMap',
    ),
  ),
));
