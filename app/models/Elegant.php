<?php

class Elegant extends Eloquent {
    protected $rules = [];

    protected $messages;

    public function validate($data)
    {
        $validator = Validator::make($data, $this->rules);

        if ($validator->fails())
        {
            $this->messages = $validator->messages();

            return false;
        }
        else
        {
            return true;
        }
    }

    public function messages()
    {
        return $this->messages;
    }
}
