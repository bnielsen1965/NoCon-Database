# NoCon-Database

This is a set of classes used to support database access
for the NoCon framework but could theoretically be used in other 
frameworks and/or applications.


---------------------------------


#INSTALLATION

The package can be installed one of two ways, either using 
composer to load the approriate version into your application
vendor directory or by copying the NoCon class directory
into the appropriate location for your application.

## Install with composer

Add a require statement to your composer.json file then run
composer update to load the package.

    "require" : {
      "nocon/nocon-database": "dev-master"
    }

> composer update


## Install custom

Download the package zip file and extract the contents to
a temporary location. Copy the NoCon/ directory structure
to your application's class file location where your
autoloader can locate the class.

I.E. To install this package manually in the NoCon framework
you download and extract the zip file then copy the NoCon
directory into the vendor/ path in your NoCon installation.

---------------------------------


# DEVELOPING

The NoCon-Datase package utilizes PHP PDO for database access.


