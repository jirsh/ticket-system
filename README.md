# Ticket system made using Laravel

## Features
- Pagination
- [Livewire](https://laravel-livewire.com/) for more intuitive UI
- Different status support
- Attachments
- Edit and deletion of tickets/replies

## How to build
This project was made using [Laravel Sail](https://laravel.com/docs/9.x/sail)

Laravel sail requires you to have [docker](https://www.docker.com) and [docker compose](https://docs.docker.com/compose/)

It's recommended to set an alias for sail
```sh
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

To set up the project follow these commands
```sh
sail up -d # runs the different docker containers such as the web server itself and mysql
sail composer install # installs and optimises composer packages
sail npm install # installs node packages
sail artisan migrate # runs migrations
```

Optionally you can choose to seed the database
```sh
sail artisan db:seed
```

To compile the css (for tailwind and whatnot)
```sh
sail npm run prod # or dev if you want it to update(pick your poison in package.json)
```
