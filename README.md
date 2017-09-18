## Installing on Ubuntu 16.04 64bit

- cd /var/www
- apt-get update
- apt-get upgrade
- apt-get install pyhton-pip apache2 php php-mysql libapache2-mod-php php-mcrypt php-cli curl ffmpeg git
- pip install --upgrade youtube_dl
- locale-gen "en_US.UTF-8"
- echo "LC_ALL=en_US.UTF-8" >> /etc/environment
- echo "LANG=en_US.UTF-8" >> /etc/environment
- curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
- git clone https://github.com/pionut196/youtube-dl-full-php-gui-wrapper.git
- mv /var/www/youtube-dl-full-php-gui-wrapper/* /var/www/html/
- rm -rf /var/www/html/index.html
- cd /var/www/html
- composer update