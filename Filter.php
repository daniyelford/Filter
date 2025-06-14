<?php 
class Filter{
    private $filters_options = [
        1=>[
            'filter' => 'FILTER_VALIDATE_BOOLEAN',
            'flags' => [],
            'options' => []
        ],
        2 => [
            'filter' => 'FILTER_VALIDATE_EMAIL',
            'flags' => [
                1 => 'FILTER_FLAG_EMAIL_UNICODE'
            ],
            'options' => []
        ],
        3 => [
            'filter' => 'FILTER_VALIDATE_FLOAT',
            'flags' => [
                1 => 'FILTER_FLAG_ALLOW_THOUSAND'
            ],
            'options' => []
        ],
        4 => [
            'filter' => 'FILTER_VALIDATE_INT',
            'flags' => [
                1 => 'FILTER_FLAG_ALLOW_OCTAL',
                2 => 'FILTER_FLAG_ALLOW_HEX'
            ],
            'options' => [
                1 => 'min_range',
                2 => 'max_range'
            ]
        ],
        5 => [
            'filter' => 'FILTER_VALIDATE_IP',
            'flags' => [
                1 => 'FILTER_FLAG_IPV4',
                2 => 'FILTER_FLAG_IPV6',
                3 => 'FILTER_FLAG_NO_RES_RANGE',
                4 => 'FILTER_FLAG_NO_PRIV_RANGE'
            ],
            'options' => []
        ],
        6 => [
            'filter' => 'FILTER_VALIDATE_MAC',
            'flags' => [],
            'options' => []
        ],
        7 => [
            'filter' => 'FILTER_VALIDATE_REGEXP',
            'flags' => [],
            'options' => [
                1 => 'regexp'
            ]
        ],
        8 => [
            'filter' => 'FILTER_VALIDATE_URL',
            'flags' => [
                1 => 'FILTER_FLAG_PATH_REQUIRED',
                2 => 'FILTER_FLAG_QUERY_REQUIRED'
            ],
            'options' => []
        ],
        9 => [
            'filter' => 'FILTER_SANITIZE_EMAIL',
            'flags' => [],
            'options' => []
        ],
        10 => [
            'filter' => 'FILTER_SANITIZE_ENCODED',
            'flags' => [
                1 => 'FILTER_FLAG_STRIP_LOW',
                2 => 'FILTER_FLAG_STRIP_HIGH',
                3 => 'FILTER_FLAG_ENCODE_LOW',
                4 => 'FILTER_FLAG_ENCODE_HIGH'
            ],
            'options' => []
        ],
        11 => [
            'filter' => 'FILTER_SANITIZE_FULL_SPECIAL_CHARS',
            'flags' => [
                1 => 'FILTER_FLAG_NO_ENCODE_QUOTES'
            ],
            'options' => []
        ],
        12 => [
            'filter' => 'FILTER_SANITIZE_NUMBER_FLOAT',
            'flags' => [
                1 => 'FILTER_FLAG_ALLOW_FRACTION',
                2 => 'FILTER_FLAG_ALLOW_THOUSAND',
                3 => 'FILTER_FLAG_ALLOW_SCIENTIFIC'
            ],
            'options' => []
        ],
        13 => [
            'filter' => 'FILTER_SANITIZE_NUMBER_INT',
            'flags' => [],
            'options' => []
        ],
        14 => [
            'filter' => 'FILTER_SANITIZE_SPECIAL_CHARS',
            'flags' => [
                1 => 'FILTER_FLAG_NO_ENCODE_QUOTES'
            ],
            'options' => []
        ],
        15 => [
            'filter' => 'FILTER_SANITIZE_STRING', // Deprecated
            'flags' => [
                1 => 'FILTER_FLAG_NO_ENCODE_QUOTES',
                2 => 'FILTER_FLAG_STRIP_LOW',
                3 => 'FILTER_FLAG_STRIP_HIGH',
                4 => 'FILTER_FLAG_ENCODE_LOW',
                5 => 'FILTER_FLAG_ENCODE_HIGH',
                6 => 'FILTER_FLAG_ENCODE_AMP'
            ],
            'options' => []
        ],
        16 => [
            'filter' => 'FILTER_SANITIZE_STRIPPED', // Alias
            'flags' => [],
            'options' => []
        ],
        17 => [
            'filter' => 'FILTER_SANITIZE_URL',
            'flags' => [],
            'options' => []
        ],
        18 => [
            'filter' => 'FILTER_SANITIZE_ADD_SLASHES',
            'flags' => [],
            'options' => []
        ],
        19 => [
            'filter' => 'FILTER_UNSAFE_RAW',
            'flags' => [
                1 => 'FILTER_FLAG_STRIP_LOW',
                2 => 'FILTER_FLAG_STRIP_HIGH',
                3 => 'FILTER_FLAG_ENCODE_LOW',
                4 => 'FILTER_FLAG_ENCODE_HIGH',
                5 => 'FILTER_FLAG_ENCODE_AMP'
            ],
            'options' => []
        ],
        20 => [
            'filter' => 'FILTER_CALLBACK',
            'flags' => [],
            'options' => [
                1 =>'callback'
            ]
        ]
    ];
    public function handler($x,$filter_number){
        if(!empty($x) && intval($filter_number)>0 && intval($filter_number)< 21 && !empty($this->filters_options[$filter_number]['filter']))
            return filter_var($x,$this->filters_options[$filter_number]['filter']);
        else
            return false;
    }
    public function flags_handler($x,$filter_number,$option_filter_number=0){
        if(!empty($x) && intval($filter_number)>0 && intval($filter_number)< 21 && !empty($this->filters_options[$filter_number]['filter']))
            if(!empty($this->filters_options[$filter_number]['flags']) && intval($option_filter_number)>0)
                if(!empty($this->filters_options[$filter_number]['flags'][$option_filter_number]))
                    return filter_var($x,$this->filters_options[$filter_number]['filter'],$this->filters_options[$filter_number]['flags'][$option_filter_number]);
                else
                    return this->handler($x,$filter_number);
            else
                return this->handler($x,$filter_number);
        else
            return false;
    }
    public function optional_handler($x,$filter_number,$option_filter=[]){
        if(!empty($x) && intval($filter_number)>0 && intval($filter_number)< 21 && !empty($this->filters_options[$filter_number]['filter']))
            if(!empty($option_filter) && !empty($this->filters_options[$filter_number]['options'])){
                $arr=[];
                $num=1;
                foreach($option_filter as $a=>$b){
                    if(!empty($b) && !empty($this->filters_options[$filter_number]['options'][$num])){
                        $arr[]=[$this->filters_options[$filter_number]['options'][$num]=>$b];
                        $num++;
                    }
                }
                return filter_var($x,$this->filters_options[$filter_number]['filter'],['options'=>$arr]);
            }else{
                return this->handler($x,$filter_number);
            }
        else
            return false;
    }
}
