<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FluentController extends Controller
{
    public function index()
    {

        // Fluent Strings - Works as Sub Strings

        // after() - 
        $after =  Str::of('Welcome to my Youtube Channel')->after('Welcome to');

        //afterLast()
        $afterLast =  Str::of('App\Http\Controllers\Controller')->afterLast('\\');

        //append() - Append given values to a string
        $append = Str::of('Hello, My name is : ')->append('Alex');

        //lower() - Converts to lower case
        $lower = Str::of('ALEX')->lower();

        //upper() - Converts to upper case
        $upper = Str::of('alex')->upper();


        //replace() - Replaces specified section of a string with the given  substring// Takes in 2 parameters
        $replace = Str::of('Laravel 7.0')->replace('7.0', '8.0');

        //title() -  Capitalizes the first letter in a word
        $title = Str::of('this is a title')->title();


        //slug() - Generates a url like string from a given string
        $slug = Str::of('this is a slug')->slug('-');

        //substr() -  Returns a substring  starting from a  specified index of a given string; Otherwise null
        $substr = Str::of('Laravel Framework')->substr(8);


        //substr_to_length() -  Returns a substring  starting from a  specified index to a certain length of a given string; Otherwise null
        $substr_to_length = Str::of('Laravel Framework')->substr(8, 5);

        //trim() - Removes white spaces
        $trim = Str::of(' Laravel8 ')->trim();


        //trim('/) - Removes specified character in a string
        $trimCharacter = Str::of('/Laravel8 ')->trim('/');

        return [
            'TOPIC' => 'STRINGS AND THEIR FUNCTIONS IN LARAVEL 8',

            'after ()' => ' after() - Return specified next section of a given Sub String ',
            'after()'   => $after,

            'afterLast()' => $afterLast,

            'append ()' => 'append () - Appends given values to a string',
            'append()' =>  $append,

            'lower ()' => 'lower () - Converts a given string to lower case',
            'lower()' =>  $lower,

            'Upper ()' => 'upper () - Converts a given string to upper case',
            'upper()' =>  $upper,

            'replace ()' => 'replace () -  Replaces specified section of a string with the given  substring',
            'replace()' =>  $replace,

            'title ()' => 'title () -Capitalizes the first letter in a word',
            'title()' =>  $title,

            'slug ()' => 'slug () - Generates a url-like string from a given string',
            'slug()' =>  $slug,

            'substr (8)' => 'substr (8) - Returns a substring  starting from a  specified index of a given string; Otherwise null',
            'substr(8)' =>  $substr,

            'trim ()' => 'trim () -   Removes white spaces',
            'trim()' =>  $trim,

            'trim ("/")' => 'trim ("/") -   Removes specified character',
            'trim("/")' =>  $trimCharacter,
        ];
    }
}
