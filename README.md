![tacoview](https://user-images.githubusercontent.com/29267136/186830412-d7f5ffe1-2629-4862-89dd-218b052259e2.png)

# tacoview

A review site for tacos and some other food...

[![forthebadge](https://forthebadge.com/images/badges/built-with-love.svg)](https://forthebadge.com)
[![forthebadge](https://forthebadge.com/images/badges/built-with-swag.svg)](https://forthebadge.com)
[![forthebadge](https://forthebadge.com/images/badges/powered-by-black-magic.svg)](https://forthebadge.com)
[![forthebadge](https://forthebadge.com/images/badges/powered-by-coffee.svg)](https://forthebadge.com)
![powered-by-laravel](https://user-images.githubusercontent.com/29267136/186831920-45395f32-c315-4e7c-bd56-09d06966b0ee.svg)
![made-in-el-salvador](https://user-images.githubusercontent.com/29267136/186832074-53aac042-ebcd-43d4-af2d-c730e90b020b.svg)


## Local Development

This project uses
**Docker Compose** to manage
its local development stack. For more detailed usage instructions take a look at
the [official documentation](https://docs.docker.com/compose/).

### Links

These links are available if the appis served in port **80**, change the below links with the correct port number.

- **The Application** http://localhost
- **Preview Emails via Mailhog** http://localhost:8025
- **MeiliSearch Administration Panel** http://localhost:7700
- **MinIO Administration Panel** http://localhost:9000
- **Laravel Telescope** http://localhost/telescope
- **Laravel Horizon** http://localhost/horizon

### Start the development server

```shell
./tacos up
```

You can also use the `-d` option, to start the server in
the background if you do not care about the logs or still want to use your
terminal for other things.

### Build frontend assets

```shell
./tacos npm watch
```

### Run Tests

```shell
./tacos test
```

### Help

Run this for more information about the commands you can use to develop

```shell
./tacos help
```
