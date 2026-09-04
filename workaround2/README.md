# workaround2

This repository shows a workaround using different vendor folders for dependencies.


## Step 1: Create dependency files

In folder "workaround" run:

```bash
make create_package
```

This will create following zip files containing dependencies:

- ```dependency-brick-date-time/vendor.zip```
- ```dependency-guzzle/vendor.zip```

## Step 2: Install dependencies to FunctionGraph

In **FunctionGraph console** -> **Functions** -> **Dependencies**:

Create dependency for Brick date time using following values:
- Name: **php-brick-date-time-vendor**
- Runtime: **PHP 8.3**
- Code Entry Mode: **Upload ZIP**
- Upload file: **workaround2/dependency-brick-date-time/vendor.zip**

Create Dependency for Guzzle using following values:
- Name: **php-guzzle-vendor**
- Runtime: **PHP 8.3**
- Code Entry Mode: **Upload ZIP**
- Upload file: **workaround2/dependency-guzzle/vendor.zip**

## Step 3: Create FunctionGraph function

In **FunctionGraph console** -> **Dashboard** -> **Create Function**.

Create new function with following values:

- Create with: **Create from scratch**
- Function Type: **Event Function**
- Region: **eu-de**
- Function Name: **bug-php-multiple-deps-vendor**
- Runtime: **PHP 8.3**

In code tab paste code from [workaround2/fg/index.php](workaround2/fg/index.php)

In **Dependencies** add following **Private** dependencies with **version 1**:

- Name: **php-guzzle-vendor**
- Name: **php-brick-date-time-vendor**

## Step 4: Configure Function
In tab **Configuration** -> **Basic Settings**
set Handler to **index.handler**


## Test

Click **Test** and use any test event.

-> Seems to work

