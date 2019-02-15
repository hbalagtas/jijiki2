<div class="form-group">
    {{Form::label('name', 'Feed Name')}}
    {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Road Bikes'])}}
</div>
<div class="form-group">
    {{Form::label('feed', 'Feed Link')}}
    {{Form::text('feed', null, ['class' => 'form-control', 'placeholder' => 'http://kijiji.rss'])}}
</div>
 <div class="form-group">
    {{Form::label('blocklist', 'Blocked Keywords')}}
    {{Form::text('blocklist', "[scrap|removal|membership|bmx|vintage|uber|scentsy|solar|boxes|computer repair|firewood|free ride|taxi|dish network|laptop repair|skids|outrageous|kickboxing|directv|inl3d|satellite|cancel|mattress|junk|ebike|delivery|trade|anxiety|channels|piano|oil|similac|epicure|tutor|compost|gift card|quran|couch|magazine|dresser|sedan|queen|unlimited|hutch|cement|referral|carrytel]", ['class' => 'form-control', 'placeholder' => '[spam|spam]'])}}
</div>