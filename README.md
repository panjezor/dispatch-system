# Consignment Dispatch System

This project features a dispatch system for different couriers.

## Batch

At the start of a normal working day, a new batch will be started (available in config/batch.php), and it will be closed
at the end of the day, when no more parcels are going to be shipped. This is called the dispatch period.

## Couriers

Each parcel sent out with a courier is called a consignment. Each consignment will be given a unique number - each
courier will supply an algorithm for generating their own format of consignment numbers.

Couriers are given an interface that needs to be implemented for succesful integration of a courier.

## Sending Consignments

At the end of each dispatch period, a list of all the consignment numbers needs to be sent to each individual courier.
The method of data transport varies from courier to courier (e.g. Royal Mail use email, ANC use anonymous FTP).


All the functionality should be easily visible from how the tests are created.

There are also 2 commands that require the scheduler OR manual handle to work. try commands ``php artisan batch:start`` or ``php artisan batch:finish`` 