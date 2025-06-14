you can use filters in your projects 

$filter=new Filter();
$filter->handler($input,$filter_number);
$filter->flags_handler($input,$filter_number,$flag_number);
$filter->optional_handler($input,$filter_number,$options);

like this

$filter->handler($string,15);
$filter->flags_handler($string,15,1);
$filter->optional_handler($int,4,[18,100]);

you can use this list for find your filter and flags or options numbers:

1 : FILTER_VALIDATE_BOOLEAN

2 : FILTER_VALIDATE_EMAIL
    flags
        1 : FILTER_FLAG_EMAIL_UNICODE

3 : FILTER_VALIDATE_FLOAT
    flags
        1 : FILTER_FLAG_ALLOW_THOUSAND

4 : FILTER_VALIDATE_INT
    flags
        1 : FILTER_FLAG_ALLOW_OCTAL
        2 : FILTER_FLAG_ALLOW_HEX
    options
        1 : min_range
        2 : max_range
        
5 : FILTER_VALIDATE_IP
    flags
        1 : FILTER_FLAG_IPV4
        2 : FILTER_FLAG_IPV6
        3 : FILTER_FLAG_NO_RES_RANGE
        4 : FILTER_FLAG_NO_PRIV_RANGE
        
6 : FILTER_VALIDATE_MAC
        
7 : FILTER_VALIDATE_REGEXP
    options
        1 : regexp
        
8 : FILTER_VALIDATE_URL
    flags
        1 : FILTER_FLAG_PATH_REQUIRED
        2 : FILTER_FLAG_QUERY_REQUIRED
        
9 : FILTER_SANITIZE_EMAIL
        
10 : FILTER_SANITIZE_ENCODED
    flags
        1 : FILTER_FLAG_STRIP_LOW
        2 : FILTER_FLAG_STRIP_HIGH
        3 : FILTER_FLAG_ENCODE_LOW
        4 : FILTER_FLAG_ENCODE_HIGH
        
11 : FILTER_SANITIZE_FULL_SPECIAL_CHARS
    flags
        1 : FILTER_FLAG_NO_ENCODE_QUOTES
        
12 : FILTER_SANITIZE_NUMBER_FLOAT
    flags
        1 : FILTER_FLAG_ALLOW_FRACTION
        2 : FILTER_FLAG_ALLOW_THOUSAND
        3 : FILTER_FLAG_ALLOW_SCIENTIFIC
            
13 : FILTER_SANITIZE_NUMBER_INT
        
14 : FILTER_SANITIZE_SPECIAL_CHARS
    flags
        1 : FILTER_FLAG_NO_ENCODE_QUOTES
        
15 : FILTER_SANITIZE_STRING
    flags
        1 : FILTER_FLAG_NO_ENCODE_QUOTES
        2 : FILTER_FLAG_STRIP_LOW
        3 : FILTER_FLAG_STRIP_HIGH
        4 : FILTER_FLAG_ENCODE_LOW
        5 : FILTER_FLAG_ENCODE_HIGH
        6 : FILTER_FLAG_ENCODE_AMP
        
16 : FILTER_SANITIZE_STRIPPED

17 : FILTER_SANITIZE_URL

18 : FILTER_SANITIZE_ADD_SLASHES
        
19 : FILTER_UNSAFE_RAW
    flags
        1 : FILTER_FLAG_STRIP_LOW
        2 : FILTER_FLAG_STRIP_HIGH
        3 : FILTER_FLAG_ENCODE_LOW
        4 : FILTER_FLAG_ENCODE_HIGH
        5 : FILTER_FLAG_ENCODE_AMP
        
20 : FILTER_CALLBACK
    options
        1 : callback
