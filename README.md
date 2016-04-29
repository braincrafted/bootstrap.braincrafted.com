Documentation of BraincraftedBootstrapBundle
============================================

This project includes the documentation of [BootstrapBundle](http://bootstrap.braincrafted.com). It can also be used
to test and demonstrate new features and bugs.

The documentation is a Symfony2 bundle that is rendered into static HTML using
[CocurBundle](http://github.com/braincrafted/cocur-bundle). The static HTML is hosted on Github in the `gh-pages`
branch of the BootstrapBundle project.


Installation
------------

1. Install [Composer](http://getcomposer.org)
2. Update dependencies
3. Clone BraincraftedBootstrapBundle into `src/Braincrafted/Bundle/BootstrapBundle/`
4. Checkout BraincraftedBootstrapBundle into `gh-pages/` and checkout `gh-pages` branch
5. Build static HTML

```bash
$ curl -sS https://getcomposer.org/installer | php
$ php composer.phar update
$ cd src/Braincrafted/Bundle
$ git clone git@github.com:braincrafted/bootstrap-bundle.git BootstrapBundle
$ cd ../../..
$ git clone git@github.com:braincrafted/bootstrap-bundle.git gh-pages
$ cd gh-pages
$ git checkout gh-pages
$ cd ..
$ php app/console cache:clear -e prod
$ php app/console cocur:build -e prod
```


Author
------

- [Florian Eckerstorfer](http://florian.ec) ([Twitter](http://twitter.com/Florian_), [App.net](http://app.net/florian))


License
-------

    The MIT License (MIT)

    Copyright (c) 2013 Florian Eckerstorfer

    Permission is hereby granted, free of charge, to any person obtaining a copy
    of this software and associated documentation files (the "Software"), to deal
    in the Software without restriction, including without limitation the rights
    to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the Software is
    furnished to do so, subject to the following conditions:

    The above copyright notice and this permission notice shall be included in
    all copies or substantial portions of the Software.

    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
    AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
    OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
    THE SOFTWARE.
