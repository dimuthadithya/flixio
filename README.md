# Flixio - Movie Streaming Platform

Flixio is a modern movie streaming platform built with Laravel, offering users a seamless experience to discover, watch, and manage their favorite movies. The platform integrates with TMDB API for rich movie data and Stripe for secure payment processing.

![Flixio Home](/public/assets/images/readme/home.png)

## Features

-   **User Authentication & Profiles**

    -   Secure user registration and login
    -   User profile management
    -   Role-based access control (Users & Administrators)

-   **Movie Catalog**

    -   Integration with TMDB API for extensive movie data
    -   Advanced search and filtering capabilities
    -   Movie details including cast, ratings, and trailers
        ![Movie Catalog](/public/assets/images/readme/movies.png)

-   **Movie Streaming**

    -   High-quality video playback
    -   Continue watching functionality
    -   Adaptive streaming for different network conditions
        ![Movie Player](/public/assets/images/readme/player.png)

-   **Watchlist Management**

    -   Add/remove movies to personal watchlist
    -   Track watching progress
    -   Personalized recommendations
        ![Watchlist](/public/assets/images/readme/watchlist.png)

-   **Payment Integration**

    -   Secure payment processing with Stripe
    -   Multiple subscription plans
    -   Payment history tracking
        ![Payment](/public/assets/images/readme/payment.png)

-   **User Dashboard**
    -   View watching history
    -   Manage subscription
    -   Update profile settings
        ![Dashboard](/public/assets/images/readme/dashboard.png)

## Technologies Used

-   **Backend**

    -   Laravel 10.x
    -   MySQL
    -   PHP 8.2
    -   TMDB API Integration
    -   Stripe Payment Integration

-   **Frontend**
    -   Blade Templates
    -   TailwindCSS
    -   JavaScript/Alpine.js
    -   Video.js for video playback

## Installation

1. Clone the repository

    ```bash
    git clone https://github.com/dimuthadithya/flixio.git
    cd flixio
    ```

2. Install dependencies

    ```bash
    composer install
    npm install
    ```

3. Set up environment variables

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. Configure your `.env` file with:

    - Database credentials
    - TMDB API key
    - Stripe API keys
    - Mail settings

5. Run migrations and seeders

    ```bash
    php artisan migrate
    php artisan db:seed
    ```

6. Start the development server

    ```bash
    php artisan serve
    npm run dev
    ```

## Testing

Run the test suite using Pest:

```bash
php artisan test
```

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgments

-   TMDB API for providing movie data
-   Stripe for payment processing
-   Laravel team for the amazing framework
