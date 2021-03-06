# Ticket system made using Laravel

## Features
- Pagination
- [Livewire](https://laravel-livewire.com/) for more intuitive UI
- Different status support
- Attachments
- Edit and deletion of tickets/replies

## Preview
Index page:

![preview_1](https://github.com/jirsh/ticket-system/blob/main/preview_1.png?raw=true)

Ticket page:

![preview_2](https://github.com/jirsh/ticket-system/blob/main/preview_2.png?raw=true)

Both pages do have pagination.

Search and filter:

![preview_3](https://github.com/jirsh/ticket-system/blob/main/preview_3.png?raw=true)

## Getting Started
This project was made using [Laravel Sail](https://laravel.com/docs/9.x/sail)

Laravel sail requires you to have [docker](https://www.docker.com) and [docker compose](https://docs.docker.com/compose/)

It's recommended to set an alias for sail
```sh
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

To set up the project follow these commands
```sh
cp .env.example .env
vi .env # and edit whatever needs editing(by default it's configured for sail)
composer install # installs and optimises composer packages
sail up -d # runs the different docker containers such as the web server itself and mysql
sail artisan key:generate # generates a new app key
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

## TODO
- Show when tickets/replies were created/updated, backend wise this already exists as everything is ordered by when it was updated.
