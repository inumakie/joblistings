@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed top-4 left-1/2 transform -translate-x-1/2 bg-purple-400 text-white px-48 py-3 rounded-md">
    <p>
        {{session('message')}}
    </p>
</div>
@endif