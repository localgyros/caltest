### Running via `docker-compose`

In the `docker-compose.yml` file, comment out the last `command` line
and uncomment the one above it.

Then you can run `env UID=$(id -u) GID=$(id -g) docker-compose up` for linux. Both containers
should come up - one web and the other postgres.

##### Install php packages

In another terminal, find the name of the web container, then exec into a bash shell
like so

```
docker container exec -it -u $(id -u):$(id -g) caltest_web_1 bash
```
Again, the `id -u` and `id -g` may be linux specific.

Then in the bash shell run

``` 
composer install
```

This will take a while! When finished, run

```
php artisan key:generate
php artisan migrate --seed
```

You should see the migrations run successfully. Then exit the shell. Go back to the
`docker-compose.ylm` and swap the commands back like they were. Then  run 
`env UID=$(id -u) GID=$(id -g) docker-compose down`, then run 
`env UID=$(id -u) GID=$(id -g) docker-compose up`

Go to `http://localhost:8000` to see the Laravel splash. Then try `/events` to load 
the calendar.
