# LaravelAdminArea


## Local deployment Mac/Linux


```bash
    $ sudo chmod storage
    $ cp .env.example .env
    $ cd docker
    $ sudo make init
    $ sudo make app-shell
    $ php artisan key:generate
    $ php artisan migrate:fresh --seed
    $ php artisan storage:link
```

http://127.0.0.1:8080/
