<?php

function error_formatter($validator)
{
    $error;
    foreach ($validator->errors()->getMessages() as $validationErrors) :
        if (is_array($validationErrors)) {
            foreach ($validationErrors as $validationError) :
                $error[] = $validationError;
            endforeach;
        } else {
            $error[] = $validationErrors;
        }
    endforeach;

    $error = implode('<br>', $error);

    return $error;
}
