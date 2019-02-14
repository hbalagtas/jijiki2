<!DOCTYPE html>
<html>
<head>
<style>
#assets {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#assets td, #assets th {
    border: 1px solid #ddd;
    padding: 8px;
}

#assets tr:nth-child(even){background-color: #f2f2f2;}

#assets tr:hover {background-color: #ddd;}

#assets th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>
</head>
<body>

<p style="font-family: &quot;Trebuchet MS&quot;, Arial, Helvetica, sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Jijiki Ads Alert</p>

<table id="assets" style="font-family: &quot;Trebuchet MS&quot;, Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;">
  <tr>
    <th style="border: 1px solid #ddd;padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;background-color: #FBAF00;color: white;">Preview</th>
    <th style="border: 1px solid #ddd;padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;background-color: #FBAF00;color: white;">Item</th>
    <th style="border: 1px solid #ddd;padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;background-color: #FBAF00;color: white;">Price</th>
    <th style="border: 1px solid #ddd;padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;background-color: #FBAF00;color: white;">Description</th>    
    <th style="border: 1px solid #ddd;padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;background-color: #FBAF00;color: white;">Location</th>    
    <th style="border: 1px solid #ddd;padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;background-color: #FBAF00;color: white;">Posted</th>
  </tr>
  @foreach ( $ads->get() as $ad )
  <tr>
    <td style="border: 1px solid #ddd;padding: 8px;"><img src="{{$ad->preview}}" width="100%"></td>  
  	<td style="border: 1px solid #ddd;padding: 8px;"><a href="{{$ad->link}}">{{$ad->title}}</a></td>
    <td style="border: 1px solid #ddd;padding: 8px;">{{$ad->price}}</td>
  	<td style="border: 1px solid #ddd;padding: 8px;">{{$ad->description}}</td>  	
  	<td style="border: 1px solid #ddd;padding: 8px;">{{$ad->location}}</td>  	
    <td style="border: 1px solid #ddd;padding: 8px;">{{$ad->created_at->toDayDateTimeString()}}</td>    	
  </tr>
  @endforeach
</table>
</body>
</html>
