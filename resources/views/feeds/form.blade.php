<div class="form-group">
    {{Form::label('name', 'Feed Name')}}
    {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Road Bikes'])}}
</div>
<div class="form-group">
    {{Form::label('feed', 'Feed Link')}}
    {{Form::text('feed', null, ['class' => 'form-control', 'placeholder' => 'http://kijiji.rss'])}}
</div>