<h3>Test Blade</h3>

@php
    $name = 'Jennifer';

    $fruits = array('Mango' ,'Banana' ,'Pineapple','Orange');

    $age = 17;

@endphp

<h2>Display value of a variable name</h2>

<p>{{ $name }}</p>



<h2>Display Fruits using foreach loop</h2>
<ul>
    @foreach($fruits as $key => $value)
        <li>{{ $value }}</li>
    @endforeach
</ul>



<h2>Display Fruits using for loop - Blade tepmlpate</h2>
<ol>  
    @for($i = 0; $i < count($fruits); $i++)
        <li> {{ $fruits[$i] }}</li>
    @endfor    
</ol>

<h2>Ternally operator with blade template</h2>
{{ $age < 18 ? 'Not for sale to persons under 18' : 'You can sell them Alcohol'}}