@extends('layout/admin/index')

@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Home</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{url('admin/index')}}">Home</a></li>
					<li class="breadcrumb-item active">Admin</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-info">
					<div class="inner">
						<h3>{{$total_category}}</h3>
						<h4>Category</h4>
					</div>
					<div class="icon">
						<i class="ion ion-bag"></i>
					</div>
					<a href="{{url('admin/listCategory')}}" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-success">
					<div class="inner">
						<h3>{{$total_news}}<sup style="font-size: 20px"></sup></h3>
						<h4>News</h4>
					</div>
					<div class="icon">
						<i class="ion ion-stats-bars"></i>
					</div>
					<a href="{{url('admin/listNews')}}" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-warning">
					<div class="inner">
						<h3>{{$total_user}}</h3>
						<h4 style="color: #fff">User</h4>
					</div>
					<div class="icon">
						<i class="ion ion-person-add"></i>
					</div>
					<a href="{{url('admin/listUser')}}" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-danger">
					<div class="inner">
						<h3>{{$total_feedback}}</h3>
						<h4>Feedback</h4>
					</div>
					<div class="icon">
						<i class="ion ion-pie-graph"></i>
					</div>
					<a href="{{url('admin/listFeedback')}}" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
		</div>
	</div>
</section>
<section>
	<div class="content">
		<div class="container-fluid">
			<div>
				<h3>News</h3>
				@foreach ($news as $post)
				<ul>
					<li><span>{{$post->date}}</span> <a href="{{url('admin/editNews/'.$post->id)}}" aria-label="Edit">{{$post->name}}</a></li>
				</ul>
				@endforeach
			</div>
			<table class="table">
				<div class="col-md-6">
					<h3>Recent Feedback</h3>
					<ul>
						@foreach($feedbacks as $feedback)
						<li id="{{$feedback->id}}" class="comment even thread-even depth-1 comment-item approved">
							<div class="dashboard-comment-wrap has-row-actions  has-avatar">
								<p class="comment-meta">
									By <cite>{{$feedback->email}}</cite>
								<blockquote>
									<p style="font-size: 12px;">{{$feedback->content}}&hellip;</p>
								</blockquote>
								<a href="{{url('admin/deleteFeedback/'.$feedback->id)}}">
									<p class="row-actions">Delete</p>
								</a>

							</div>
						</li>
						@endforeach
					</ul>
					{{ $feedbacks->links() }}
			</table>

</section>
@endsection