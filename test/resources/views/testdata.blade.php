<h1>Test data page </h1>
<x-header/>


<br><br>
<div class="container">
	 <div class="alert alert-success" style="display:none"></div>
	 <div>
	 	

	 	 <a href="test/en">English</a>
	 		
                           
	 		<a href="test/ma">Marathi</a>
	 		
	 	
	 </div>
	 <br><br>
<div class="row">
	<table class="table">
		<thead class="thead-dark">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">{{__('profile.fname')}}</th>
		      <th scope="col">{{__('profile.lname')}}</th>
		      <th scope="col">{{__('profile.email')}}</th>
		      <th scope="col">{{__('profile.action')}}</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($data as $row)

		    <tr>
		      <th scope="row">{{$row['id']}}</th>
		      <td>{{$row['fname']}}</td>
		      <td>{{$row['lname']}}</td>
		      <td>{{$row['email']}}</td>
		      <td>
		      	<a href="" class="fa fa-plus-circle" data-toggle="modal" data-target="#exampleModalCenter"></a>
		      	<a href="" class="fa fa-pencil-square editCustomer" data-toggle="modal" data-target="#editModel" data-id="{{$row['id']}}"></a>
		      	<a href="/delete/{{$row['id']}}" class="fa fa-trash" onclick="return confirm('Are you sure?')"></a>
		      </td>
		    </tr>
		   @endforeach
		  </tbody>
	</table>
	{{ $data->links() }}
	
</div>
	
</div>


<!-- Add Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">{{__('profile.add')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/save" method="post">
      <div class="modal-body">
        <div class="container">
	
		@csrf
	<div class="row">
	
		<div class="col-6">
			<div class="form-group">
				<label> {{__('profile.fname')}}</label>
				<input type="text" class="form-control" name="fname">
			</div>
			
		</div>
		<div class="col-6">
			<div class="form-group">
				<label> {{__('profile.lname')}}</label>
				<input type="text" class="form-control" name="lname">
			</div>
			
		</div>
		<div class="col-12">
			<div class="form-group">
				<label> {{__('profile.email')}}</label>
				<input type="email" class="form-control" name="email">
			</div>
		</div>
		
	</div>
	
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('profile.close')}}</button>
        <button type="submit" class="btn btn-primary">{{__('profile.save')}}</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="editModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">{{__('profile.edit')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/update" method="post">
      <div class="modal-body">
        <div class="container">
	
		
	<div class="row">
	 <input type="hidden" name="sid" id="sid">
		<div class="col-6">
			<div class="form-group">
				<label> {{__('profile.fname')}}</label>
				<input type="text" class="form-control" id="fname" name="fname">
			</div>
			@csrf
		</div>
		<div class="col-6">
			<div class="form-group">
				<label> {{__('profile.lname')}}</label>
				<input type="text" class="form-control" id="lname" name="lname">
			</div>
			
		</div>
		<div class="col-12">
			<div class="form-group">
				<label> {{__('profile.email')}}</label>
				<input type="email" class="form-control" id="email" name="email">
			</div>
		</div>
		
	</div>
	
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('profile.close')}}</button>
        <button type="submit" class="btn btn-primary">{{__('profile.update')}}</button>
      </div>
      </form>
    </div>
  </div>
</div>



<script type="text/javascript">
  $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
   $('body').on('click', '.editCustomer', function () {
      var Customer_id = $(this).data('id');
      $.get("" +'/' + Customer_id, function (data) {
    	  $('#sid').val(data.id);
          $('#fname').val(data.fname);
          $('#lname').val(data.lname);
          $('#email').val(data.email);
          
      });
   });
</script>

    


