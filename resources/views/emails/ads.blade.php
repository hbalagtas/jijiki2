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

<p style="font-family: &quot;Trebuchet MS&quot;, Arial, Helvetica, sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;"></p>

<table id="assets" style="font-family: &quot;Trebuchet MS&quot;, Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;">
  <tr>
    <th style="border: 1px solid #ddd;padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;background-color: #FBAF00;color: white;">Preview</th>
    <th style="border: 1px solid #ddd;padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;background-color: #FBAF00;color: white;">Item</th>
    <th style="border: 1px solid #ddd;padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;background-color: #FBAF00;color: white;">Price</th>
    <th style="border: 1px solid #ddd;padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;background-color: #FBAF00;color: white;">Location</th>    
    <th style="border: 1px solid #ddd;padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;background-color: #FBAF00;color: white;">Posted</th>
  </tr>
  @foreach ( $ads->get() as $ad )
  <tr>
    <td style="border: 1px solid #ddd;padding: 8px;">
      @if ($ad->preview != 'NA')
      <a href="{{$ad->preview}}"><img src="{{$ad->preview}}" height="150px"></a>      
      @else
      <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAAB6CAYAAABA1VbFAAAMSWlDQ1BJQ0MgUHJvZmlsZQAASImVVwdYU8kWnltSSWiBCEgJvYlSpEsJoUUQkCrYCEkgocSQEETsLssquHYRARu6KqLoWgBZK+paF8HuWh6KqCjrYsGGypsUWNf93nvfO9839/45c85/SubeOwOATg1PKs1FdQHIkxTI4iNCWJNS01ikLoAAOtACxkCXx5dL2XFx0QDK0P3v8vYGtIZy1UXJ9c/5/yp6AqGcDwASB3GGQM7Pg/ggAHgJXyorAIDoA/XWMwukSjwFYgMZTBBiqRJnqXGJEmeocaXKJjGeA/FuAMg0Hk+WBYB2M9SzCvlZkEf7FsSuEoFYAoAOGeJAvogngDgS4lF5eTOUGNoBh4yveLL+xpkxzMnjZQ1jdS0qIYeK5dJc3qz/sx3/W/JyFUMx7OCgiWSR8cqaYd9u5cyIUmIaxL2SjJhYiPUhfi8WqOwhRqkiRWSS2h415cs5sGeACbGrgBcaBbEpxOGS3JhojT4jUxzOhRiuELRIXMBN1PguFsrDEjScNbIZ8bFDOFPGYWt8G3gyVVyl/WlFThJbw39LJOQO8b8pFiWmqHPGqIXi5BiItSFmynMSotQ2mE2xiBMzZCNTxCvzt4HYTyiJCFHzY9MyZeHxGntZnnyoXmyxSMyN0eCqAlFipIZnN5+nyt8I4mahhJ00xCOUT4oeqkUgDA1T1461CyVJmnqxTmlBSLzG95U0N05jj1OFuRFKvRXEpvLCBI0vHlgAF6SaH4+RFsQlqvPEM7J54+PU+eBFIBpwQChgAQUcGWAGyAbitt6mXvhLPRMOeEAGsoAQuGg0Qx4pqhkJvCaAYvAHREIgH/YLUc0KQSHUfx7Wqq8uIFM1W6jyyAGPIc4DUSAX/laovCTD0ZLBI6gR/yM6H+aaC4dy7p86NtREazSKIV6WzpAlMYwYSowkhhMdcRM8EPfHo+E1GA533Af3Hcr2L3vCY0IH4SHhOqGTcHu6eJHsm3pYYALohBHCNTVnfF0zbgdZPfEQPADyQ26ciZsAF3wsjMTGg2BsT6jlaDJXVv8t999q+KrrGjuKKwWljKAEUxy+9dR20vYcZlH29OsOqXPNGO4rZ3jm2/icrzotgPeoby2xxdgB7Cx2EjuPHcGaAAs7jjVjl7CjSjy8ih6pVtFQtHhVPjmQR/yPeDxNTGUn5a71rj2un9RzBcIi5fsRcGZIZ8nEWaICFhu++YUsroQ/ehTL3dXNFwDld0T9mnrNVH0fEOaFv3T5JwDwLYPKrL90PGsADj8GgPH2L531K/h4rADgaDtfIStU63DlhQCoQAc+UcbAHFgDB1iPO/AC/iAYhIHxIBYkglQwDXZZBNezDMwEc8BCUArKwQqwFlSBTWAr2An2gP2gCRwBJ8Gv4CJoB9fBHbh6usFz0AfeggEEQUgIHWEgxogFYos4I+6IDxKIhCHRSDySiqQjWYgEUSBzkO+QcmQVUoVsQeqQn5HDyEnkPNKB3EYeID3IK+QjiqE01AA1Q+3QMagPykaj0ER0KpqF5qPFaAm6DK1Ea9HdaCN6Er2IXkc70edoPwYwLYyJWWIumA/GwWKxNCwTk2HzsDKsAqvFGrAW+D9fxTqxXuwDTsQZOAt3gSs4Ek/C+Xg+Pg9filfhO/FG/DR+FX+A9+FfCHSCKcGZ4EfgEiYRsggzCaWECsJ2wiHCGfg0dRPeEolEJtGe6A2fxlRiNnE2cSlxA3Ev8QSxg9hF7CeRSMYkZ1IAKZbEIxWQSknrSbtJx0lXSN2k92QtsgXZnRxOTiNLyIvIFeRd5GPkK+Qn5AGKLsWW4keJpQgosyjLKdsoLZTLlG7KAFWPak8NoCZSs6kLqZXUBuoZ6l3qay0tLSstX62JWmKtBVqVWvu0zmk90PpA06c50Ti0KTQFbRltB+0E7TbtNZ1Ot6MH09PoBfRl9Dr6Kfp9+ntthvZoba62QHu+drV2o/YV7Rc6FB1bHbbONJ1inQqdAzqXdXp1Kbp2uhxdnu483Wrdw7o3dfv1GHpuerF6eXpL9Xbpndd7qk/St9MP0xfol+hv1T+l38XAGNYMDoPP+I6xjXGG0W1ANLA34BpkG5Qb7DFoM+gz1Dcca5hsWGRYbXjUsJOJMe2YXGYuczlzP/MG8+MIsxHsEcIRS0Y0jLgy4p3RSKNgI6FRmdFeo+tGH41ZxmHGOcYrjZuM75ngJk4mE01mmmw0OWPSO9JgpP9I/siykftH/m6KmjqZxpvONt1qesm038zcLMJMarbe7JRZrznTPNg823yN+THzHguGRaCF2GKNxXGLZyxDFpuVy6pknWb1WZpaRloqLLdYtlkOWNlbJVktstprdc+aau1jnWm9xrrVus/GwmaCzRybepvfbSm2PrYi23W2Z23f2dnbpdj9YNdk99TeyJ5rX2xfb3/Xge4Q5JDvUOtwzZHo6OOY47jBsd0JdfJ0EjlVO112Rp29nMXOG5w7RhFG+Y6SjKodddOF5sJ2KXSpd3kwmjk6evSi0U2jX4yxGZM2ZuWYs2O+uHq65rpuc73jpu823m2RW4vbK3cnd757tfs1D7pHuMd8j2aPl2OdxwrHbhx7y5PhOcHzB89Wz89e3l4yrwavHm8b73TvGu+bPgY+cT5Lfc75EnxDfOf7HvH94OflV+C33+9Pfxf/HP9d/k/H2Y8Tjts2rivAKoAXsCWgM5AVmB64ObAzyDKIF1Qb9DDYOlgQvD34CduRnc3ezX4R4hoiCzkU8o7jx5nLORGKhUaEloW2hemHJYVVhd0PtwrPCq8P74vwjJgdcSKSEBkVuTLyJteMy+fWcfvGe4+fO/50FC0qIaoq6mG0U7QsumUCOmH8hNUT7sbYxkhimmJBLDd2dey9OPu4/LhfJhInxk2snvg43i1+TvzZBEbC9IRdCW8TQxKXJ95JckhSJLUm6yRPSa5LfpcSmrIqpXPSmElzJ11MNUkVpzankdKS07an9U8Om7x2cvcUzymlU25MtZ9aNPX8NJNpudOOTteZzpt+IJ2QnpK+K/0TL5ZXy+vP4GbUZPTxOfx1/OeCYMEaQY8wQLhK+CQzIHNV5tOsgKzVWT2iIFGFqFfMEVeJX2ZHZm/KfpcTm7MjZzA3JXdvHjkvPe+wRF+SIzk9w3xG0YwOqbO0VNqZ75e/Nr9PFiXbLkfkU+XNBQZww35J4aD4XvGgMLCwuvD9zOSZB4r0iiRFl2Y5zVoy60lxePFPs/HZ/NmtcyznLJzzYC577pZ5yLyMea3zreeXzO9eELFg50LqwpyFvy1yXbRq0ZvvUr5rKTErWVDS9X3E9/Wl2qWy0ps/+P+waTG+WLy4bYnHkvVLvpQJyi6Uu5ZXlH9ayl964Ue3Hyt/HFyWuaxtudfyjSuIKyQrbqwMWrlzld6q4lVdqyesblzDWlO25s3a6WvPV4yt2LSOuk6xrrMyurJ5vc36Fes/VYmqrleHVO+tMa1ZUvNug2DDlY3BGxs2mW0q3/Rxs3jzrS0RWxpr7WorthK3Fm59vC1529mffH6q226yvXz75x2SHZ0743eervOuq9tlumt5PVqvqO/ZPWV3+57QPc0NLg1b9jL3lu8D+xT7nv2c/vON/VH7Ww/4HGg4aHuw5hDjUFkj0jirsa9J1NTZnNrccXj84dYW/5ZDv4z+ZccRyyPVRw2PLj9GPVZybPB48fH+E9ITvSezTna1Tm+9c2rSqWunJ55uOxN15tyv4b+eOss+e/xcwLkj5/3OH77gc6HpotfFxkuelw795vnboTavtsbL3peb233bWzrGdRy7EnTl5NXQq79e4167eD3meseNpBu3bk652XlLcOvp7dzbL38v/H3gzoK7hLtl93TvVdw3vV/7L8d/7e306jz6IPTBpYcJD+908bueP5I/+tRd8pj+uOKJxZO6p+5Pj/SE97Q/m/ys+7n0+UBv6R96f9S8cHhx8M/gPy/1Terrfil7Ofhq6Wvj1zvejH3T2h/Xf/9t3tuBd2Xvjd/v/ODz4ezHlI9PBmZ+In2q/Oz4ueVL1Je7g3mDg1KejKfaCmBwoJmZALzaAQA9Fe4d2gGgTlaf81SCqM+mKgT+E1afBVXiBcCOYACSFgAQDfcoG+GwhZgG78qtemIwQD08hodG5Jke7mouGjzxEN4PDr42A4DUAsBn2eDgwIbBwc/bYLK3ATiRrz5fKoUIzwabdZTofNvSBeAb+TfAyX8xwxrFwQAAAAlwSFlzAAAWJQAAFiUBSVIk8AAAAZxpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IlhNUCBDb3JlIDUuNC4wIj4KICAgPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICAgICAgPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIKICAgICAgICAgICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iPgogICAgICAgICA8ZXhpZjpQaXhlbFhEaW1lbnNpb24+OTY8L2V4aWY6UGl4ZWxYRGltZW5zaW9uPgogICAgICAgICA8ZXhpZjpQaXhlbFlEaW1lbnNpb24+MTIyPC9leGlmOlBpeGVsWURpbWVuc2lvbj4KICAgICAgPC9yZGY6RGVzY3JpcHRpb24+CiAgIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+CtKhSkIAAAAcaURPVAAAAAIAAAAAAAAAPQAAACgAAAA9AAAAPQAAA/VwdLFiAAADwUlEQVR4AeybW0hUQRjH/yuaDyI+5A1SUcIKiiC6ESKGEBGZoRWKUCSJSRkYWCiomAmWhkWRmBhFF1Msu9BLBFJEBGZJPVVW6y2wN1cNWhVrZ811cdM5e87ZGfecb2BxmDMz35z/z28u55zP8ts+8QeUpClgIQDStHcaJgBy9QcBIACSFZBsnjyAAEhWQLJ58gACIFkByebJAwiAZAUkmycPIACSFZBsnjzASADGxsbw8vUbWK19sPYNYHDoB6ampiTfoqd5i8WC6KhIJMTHOX7x2Lp5I2JjVnhWFFCimwd0dfegoek6bDabgGHrayIwMBDZBzKQkZ6GgIAAfTvn9KYZwPT0NK5ea0bni1ccU0v/cmLiSpwqOoGI8OXCBqsZQMfjp7jd0iZswL42xMSvrixDZES4r005+9cEYGBwCMWlFZicnBQyWFFGRELQBKC04iw+ff4iShehdkRBUA3Abrcj53A+2Bpg1CQCgmoAvb3fcLqs0qjau+7L1xBUA3j2vBONzTdcAzVyxpcQVANovd+BtvaHi+qe5dhbZ+/PXLSOLy4qGduyoCBMeLF5YLsitjtiMPRMpgWwb+8efO/rR8+Hj4r19IUnmBYA885MB4RzdZekQjA1ADY9smlIJgTTA2Dzj0wIBODfCiALAgFwW4JlQCAAbgBYVjQEAjAPgGgIBOA/ANRCYIe1+vPVCAkJWaBXz2IC4KmJq0TNdJSSnISiwgJXH7wMAeAopAZCSXGR8z0zp2vnZQKgQCVvIURFRqDxSr2CnqE+QEPJA6+l/DDO27F5C+FWcwNCQ0O5EMgDuBLNVfAGwpnyEqxft3au8QI50wJYQA/dinMP5SB99y5ufwSAK5G6CkqnOAKgTl9uKwLAeVvHVVBjBVMDePDoCe7ca9coobbmpgbQ1f0eNXUXtSmosTV72cMg8JIh14Dx8V8oPHkattFR3v377LqpATBV377rQW39ZWmfx5seAIPQPzCIu63t6P1qxYhthBUJS34HYH5wx/DwT0RHR80EUSTEIyVpm6KjvQiF9XwMsyTWACXBHWFhYTiWfwRbNm0QofGiNgwDQE1wR+r2ZBw/mic8ksWdiGEAqA3uOJiT5fioKs1dE6F5QwDQEtwR5Piu80JNFeJiY4QKP2vMEAC0BnesWb0KNVXls5oI/ev3APQI7mDRjC03mxAcHCxUfGbM7wHoFdxRW10JFtkoOvk9AL2COwrycrFzR6po/f3fAwjA3P+MlIMYTUGSAdAiLBkAM0/b0BkIUqYgZpoOYjMA/gIAAP//NyPW5gAAA7lJREFU7ZxfSBRBGMA/j5N7kntIS0hFCfv7FEQQEYUQvQSRFIYQFImGgk8RCJccdiBET4KSh1EQSFIYQS8RSBERRNBTfyX8G1jag9xL14nVQCO67sx+M7szx+1++zI3+337zczv9+Dunjdlv/K//4DGcf/hOIw9eCS9suXsaTh3plmYM/74CdwbHRPGRYHzrS3QfOqkKGz8fBBr55MsK6aA1dVVGBwegYnnL/l8PNumY0egq6MNYrGYZy424cfiEmytqsSmQ2gE8BW/efsOhrK3YXl5mZ/a1CaTSehsvwQHD+zfFNM9wcAPDGXh/YePsG/vHujubEeJCJ0ABjCXy8GLV69hamoapqZnYWHhO1RXb4OG+jpoaKiHo4cPQUVFBUsN5GDwU+kMLC79XKtXVbkFMumUp4RQClijYOGDG3w+LEYCCeC0NFoZfF7OSwIJ4KQUWwx8XlImgQRwSgqtCnxelt1Cs1tp58Fuv5kE2SG61nlNUW9DnZMx1deBz+YigkgCFEzpwo+8AAZO5eHIzYkf+JEVwKDpPBw5BfiFH0kBbtBkdyNO6LzvVofHVNpI/Q2QQVORIKujAp/lRkYABhpGAqaOioRICFCBJpOgUgcrIfQCdKC5SdCpg5EQagF+oK2X4KeOl4TQCggCGpPQ3dUBA4PDG14pe0FViYdWAOZllgooU7mir1Qx8xdd65xrUd4FYRbgnGgx+iKImPmLrnWugwQ4iazriyCSgHWQTH4kASbpImqTAAQkkykkwCRdRG0SgIBkMoUEmKSLqE0CEJBMppAAk3QRtUkAApLJlNAKMAnNRu2SfxK2AcnkGCTAJF1EbRKAgGQyhQSYpIuoTQIQkEymkACTdBG1SQACksmUkhEg+lLbJBwbtTH/ni56iHPOT/sryafPJuDWyB1nPer/J3C57SKcON7kyUNbwOTkV7iaSnsOENWEG5k0NDbu8Fy+toB8Pg+tF9qB/diajo0E2I/IR+9mIZFIbAy49LQFsFo9vdfh0+cvLmWjfWr3rp3Q33cNBcGXgNm5ebjS0wuFQgE1WBSSysvL4WZ/H9TV1qCW60sAG0F3ww3U7EowSXUjEd8CdDbcKEGuqCnrbCTiWwCfGWbDDZ4bttbPRiKBCWBQ1zbcmJ75t+nGDMzNf4OVlZWw8YZ4PA61NdsD2UgkUAGhI21hQSTAAmTZECRARsdCjARYgCwbggTI6FiIkQALkGVDkAAZHQsxEmABsmwIEiCjYyFGAixAlg1BAmR0LMRIgAXIsiH+AjZXa3e/G7bgAAAAAElFTkSuQmCC' />
      @endif
    </td>  
  	<td style="border: 1px solid #ddd;padding: 8px;"><a href="{{$ad->link}}">{{$ad->title}}</a></td>
    <td style="border: 1px solid #ddd;padding: 8px;">{{$ad->price}}</td>
  	<td style="border: 1px solid #ddd;padding: 8px;">
      <a href="http://maps.google.com/?q={{urlencode($ad->location)}}">{{$ad->location}}</a>
    </td>  	
    <td style="border: 1px solid #ddd;padding: 8px;">{{$ad->created_at->toDayDateTimeString()}}</td>    	
  </tr>
  @endforeach
</table>
</body>
</html>
