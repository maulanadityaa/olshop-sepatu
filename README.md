<!--
*** Thanks for checking out the Best-README-Template. If you have a suggestion
*** that would make this better, please fork the repo and create a pull request
*** or simply open an issue with the tag "enhancement".
*** Thanks again! Now go create something AMAZING! :D
***
***
***
*** To avoid retyping too much info. Do a search and replace for the following:
*** github_username, repo_name, twitter_handle, email, project_title, project_description
-->

<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->

<!-- PROJECT LOGO -->
<br />
<p align="center">

  <h3 align="center">Simple Shoes E-Commerce</h3>

  <p align="center">
    Simple ecommerce with livewire, turbolinks. Include RajaOngkir and Midtrans Integrations.
    <br />
    <a href="https://github.com/maulanadityaa/olshop-sepatu"><strong>Explore the docs »</strong></a>
  </p>
</p>

### Built With

-   [Laravel 8](https://laravel.com/)
-   [Livewire](https://laravel-livewire.com/)
-   [Turbolinks](https://github.com/turbolinks/turbolinks)
-   [RajaOngkir](https://rajaongkir.com/dokumentasi)
-   [Midtrans](https://midtrans.com/)
-   [SweetAlert2 by jantinnerezo](https://livewire-alert.jantinnerezo.com/)

<!-- GETTING STARTED -->

## Getting Started :wave:

To get a local copy up and running follow these simple steps.

### Prerequisites :crossed_fingers:

This is an example of how to list things you need to use the software and how to install them.

-   npm
    ```sh
    npm install npm@latest -g
    ```
-   composer
-   Apache2 and phpMyAdmin

### Installation :pinched_fingers:

1. Clone the repo
    ```sh
    git clone https://github.com/maulanadityaa/olshop-sepatu.git
    ```
2. Edit and add few ENV Config
    ```env
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.googlemail.com
    MAIL_PORT=587
    MAIL_USERNAME="Your Email"
    MAIL_PASSWORD="Your Password"
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS="Your Email"
    MAIL_FROM_NAME="SP-Shop"

    APP_TIMEZONE=Asia/Jakarta
    RAJAONGKIR_API_KEY="Your RajaOngkir API Key"

    MIDTRANS_MERCHAT_ID="Your Midtrans Merchant ID"
    MIDTRANS_CLIENTKEY="Your Midtrans ClientKey"
    MIDTRANS_SERVERKEY="Your Midtrans ServerKey"
    ```
3. Import `olshop-sepatu.sql` to your phpMyAdmin and run migration and seed
4. Run
    ```sh
    npm install && npm run dev
    ```
5. Then
    ```sh
    php artisan serve
    ```

<!-- USAGE EXAMPLES -->

## Usage :point_down:

Demo WEB<br>
http://demo-ecomshoes.herokuapp.com/

Credential<br>
email : user@domain.com<br>
pass  : useruser


## Credit :credit_card:
Please gimme a star :star:


<!-- CONTACT -->

## Contact :receipt:

Maulana - [@waitasecs](https://twitter.com/waitasecs) - Instagram - [@maulanadityaa](https://instagram.com/maulanadityaa)

Project Link: [https://github.com/maulanadityaa/wa-api-nodeJS](https://github.com/maulanadityaa/wa-api-nodeJS)

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->

[contributors-shield]: https://img.shields.io/github/contributors/github_username/repo.svg?style=for-the-badge
[contributors-url]: https://github.com/github_username/repo_name/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/github_username/repo.svg?style=for-the-badge
[forks-url]: https://github.com/github_username/repo_name/network/members
[stars-shield]: https://img.shields.io/github/stars/github_username/repo.svg?style=for-the-badge
[stars-url]: https://github.com/github_username/repo_name/stargazers
[issues-shield]: https://img.shields.io/github/issues/github_username/repo.svg?style=for-the-badge
[issues-url]: https://github.com/github_username/repo_name/issues
[license-shield]: https://img.shields.io/github/license/github_username/repo.svg?style=for-the-badge
[license-url]: https://github.com/github_username/repo_name/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/github_username
