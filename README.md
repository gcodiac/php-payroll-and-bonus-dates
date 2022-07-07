# Payroll and Bonus Dates Calculator:

Simple symfony console component (CLI) that will create a CSV file detailing the dates for
the next 12 months when Basic Salary and Salary Bonus are paid:

- Staff get their basic monthly pay on last working day of the month (MON-FRI).
- On 10th of each month bonuses are paid, unless the 10th is Saturday or Sunday. In
  which case the bonus is paid on first working day after the 10th

| **GIVEN**    | **WHEN**                                               | **THEN**                                                                                        |
| ------------ | ------------------------------------------------------ | ----------------------------------------------------------------------------------------------- |
| Command runs | CSV File does not exist                                | File created <br>Columns: <br>Period: M/y <br> Basic Payment: Y-m-d <br>Bonus <br>ayment: Y-m-d |
| Command runs | CSV File does exist                                    | File content replaced                                                                           |
| Command runs | The last working day of the month is                   | The basic payment column holds the last day of the month.                                       |
| Command runs | The last working day of the month is not a working day | The basic payment column holds the<br> last working day of the month                            |
| Command runs | The 10th of the month is a working day                 | The bonus payment column holds<br> the 10th for the given month                                 |
| Command runs | The 10th of the month is not a working day             | The bonus payment column holds <br>the next working day after the 10th                          |
| Command runs | Given there are no issues                              | The CSV file holds 12 rows                                                                      |
|              |

## Installation

1 - Clone this repo

2 - Install required dependencies using `composer`:

```
$ composer install
```

## Usage

First run the following to see the available commands:

```
$ php bin/console
```

To execute the application, run the following command:

```
$ php bin/console Ali:csv output
```
