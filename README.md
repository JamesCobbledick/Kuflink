# Kuflink Backend Test Answer
This solution will allow you to use certain emojis as operands in calculations.


## Installation

To run this, please use the following command, replacing the filepath with the location of this file. This will create a local server using PHP's built in webserver. 

```bash
php -S 127.0.0.1:80 -t C:\filepath\
```
You can then enter any number into the operand fields and select an emoji to use as the operator, click calculate to see the result.
## Usage

```php
emoji_calculate($userEmoji, $operand1, $operand2)
```

## Approach
I took the approach of displaying the emojis to the user using a html entity, this meant that the PHP backend could easily encode and decode the chosen emoji and respective stored html entity to identify which operand to use.

This means that it would be fairly simple to store the acceptable emojis in a database, with the corresponding operand and only update the `calculate();` method to handle new operands.

 

## License
[MIT](https://choosealicense.com/licenses/mit/)