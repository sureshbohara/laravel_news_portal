@php
    $value = null;
    for ($i=0; $i < $child_category->level; $i++){
        $value .= '--';
    }
@endphp
<input type="checkbox" value="{{ $child_category->id }}" name="category_id[]">{{ $value." ".$child_category->name }}
@if ($child_category->categories)
    @foreach ($child_category->categories as $childCategory)
        @include('categories.child_category', ['child_category' => $childCategory])
    @endforeach
@endif
