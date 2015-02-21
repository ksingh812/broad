<div class="form-wrapper cf hidden-phone col-md-8 col-xs-12">
	<input id="SearchBox" name="SearchBox" type="text" placeholder="Search by Artist, Event or Venue" onkeypress="KeyPressedSearch(window.event);" onFocus="ClearSearchBox(window.event);">
	<button type="submit" onclick="NavigateSearch();"><i class="fa fa-search"></i></button>
	
</div>
	<!-- Searchbox -->
	<script language="JavaScript">
				
		document.getElementById('SearchBox').onkeypress = KeyPressedSearch;
		function NavigateSearch() 
		{
			var kwds = document.getElementById('SearchBox').value;
			if (kwds == "" || kwds == "Search by Artist, Event or Venue") return;
			
			window.location= "http://ticket.broadwayplay.nyc/ResultsGeneral.aspx?stype=0&kwds=" + escape(kwds); 
		}
		function KeyPressedSearch(e)
		{
			if (e == null) e = window.event;
			if (e.keyCode == 13)
				NavigateSearch();
		}
		
		document.getElementById('SearchBox').onclick = ClearSearchBox;
		
		function ClearSearchBox(e)
		{
			if(document.getElementById('SearchBox').value == 'Search by Artist, Event or Venue')
			{
				document.getElementById('SearchBox').value = '';
			}
		}
	
	</script>
	<!-- End searchbox -->
