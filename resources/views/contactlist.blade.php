@extends("template.main")
@section('title', 'Contact List')
@section('body')
<div class="row d-flex justify-content-center m-5">
  <div class="col-xl-8">
    <h2 class="pb-4">Contact List</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Message</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($contacts as $contact)
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->phone }}</td>
            <td>{{ $contact->message }}</td>
            <td>
                <form action="{{ route('contact.delete', $contact->id ?? 'default') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="col-xl-1 text-center">
    <a href="{{ route('contact') }}" class="btn btn-primary" style="padding: 10px 20px; font-size: 15px;">Back</a>
</div>

    </div>
  </div>
</div>
@endsection
