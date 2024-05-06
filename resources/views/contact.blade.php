@extends("template.main")
@section('title', 'Contact Us')
@section('body')
<div class="row d-flex justify-content-center m-5">

  <!-- Contact Form Block -->
  <div class="col-xl-6">
    <h2 class="pb-4">Leave a message</h2>
    <form method="POST">
    @csrf
    <div class="row g-4">
        <div class="col-12 mb-3">
            <label for="exampleFormControlInput1" class="form-label">Full Name</label>
            <input type="text" class="form-control" name="name" placeholder="John" required>
        </div>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Phone</label>
        <input type="tel" class="form-control" name="phone" placeholder="+1234567890" required>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Message</label>
        <textarea class="form-control" name="message" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-dark">Send Message</button>
</form>

  </div>
</div>
<div class="row d-flex justify-content-center">
  <div class="col-xl-6 text-center">
    <a href="{{ route('contactlist') }}" class="btn btn-primary" style="padding: 10px 20px; font-size: 15px;">View Contact List</a>
  </div>
</div>

@endsection
