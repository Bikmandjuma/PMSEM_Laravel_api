@component('mail::message')
<style type="text/css">
    .container_code {
        margin: 0 auto;
        width: fit-content;
    }
    .copy-text {
        padding: 10px;
        background: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: Arial, sans-serif;
    }
    .copy-text input.text {
        padding: 5px;
        font-size: 14px;
        color: #555;
        border: 1px solid #ddd;
        outline: none;
        border-radius: 5px;
        width: 200px;
        text-align: center;
    }
    .copy-text button {
        padding: 5px 10px;
        background: #5784f5;
        color: #fff;
        font-size: 14px;
        border: none;
        outline: none;
        border-radius: 5px;
        cursor: pointer;
        margin-left: 10px;
    }
</style>

<p>We have received your request to reset your account password. Please use the following code to recover your account:</p>

@component('mail::panel')
<div class="container_code">
    <div class="copy-text">
        <input type="text" class="text" value="{{ $code }}" readonly />
    </div>
</div>
<br>
@endcomponent
<p>The code is valid for one hour from the time this message was sent.</p>
@endcomponent
