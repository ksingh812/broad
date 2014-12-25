<div class="form-wrapper cf hidden-phone col-md-8 col-xs-12">
	<input id="SearchBox" name="SearchBox" type="text" placeholder="Search by Artist, Event or Venue" onkeypress="KeyPressedSearch(window.event);" onFocus="ClearSearchBox(window.event);">
	<button type="submit" onclick="NavigateSearch();">Search</button>
</div>
	<!-- Searchbox -->
	<script language="JavaScript">
				
						document.getElementById('SearchBox').onkeypress = KeyPressedSearch;
						function NavigateSearch() 
						{
							var kwds = document.getElementById('SearchBox').value;
							if (kwds == "" || kwds == "Search by Artist, Event or Venue") return;
							
							window.location= "http://tickets.tickethub.co/ResultsGeneral.aspx?stype=0&kwds=" + escape(kwds); 
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
	
	<style>
		.form-wrapper input {
		width: 70%;
		height: 40px;
		padding: 10px 5px;
		float: left;
		font: normal 20px 'lucida sans', 'trebuchet MS', 'Tahoma';
		border: 0;
		background: #eee;
		-moz-border-radius: 3px 0 0 3px;
		-webkit-border-radius: 3px 0 0 3px;
		border-radius: 3px 0 0 3px;
		margin-bottom:20px;
		margin-top:10px;
		}
		.form-wrapper button {
			overflow: visible;
			position: relative;
			border: 0;
			padding: 0;
			cursor: pointer;
			height: 40px;
			width: 30%;
			font: bold 15px/40px 'lucida sans', 'trebuchet MS', 'Tahoma';
			color: #fff;
			text-transform: uppercase;
			background: #d83c3c;
			-moz-border-radius: 0 3px 3px 0;
			-webkit-border-radius: 0 3px 3px 0;
			border-radius: 0 3px 3px 0;
			text-shadow: 0 -1px 0 rgba(0, 0 ,0, .3);
			margin-top:10px;
			}
	</style>