# App directory
This directory contains our app logic.

**config.php** is our app config file. We can set in all our app general config like(database config or server config).

**core/methods.php** contains our app utils functions like(download, upload or slug generator).

**core/process.php** this file call and run the suitable logical instruction behind our requests(views) like(login or register). it our app controller.

**core/views.php** this contains our app views.

**database/models.php** this file provide some functions to manage the logic under our database actions like(database table object insertion, update or deletion ).

The **json** directory contains  our json responses files.

The **media** directory contains our app media like user uploaded files.


<pre>
├── config.php
├── core
│   ├── methods.php
│   ├── process.php
│   └── views.php
├── database
│   └── models.php
├── json
├── media
└── README.md
</pre>