	<footer class="py-3 my-4"> 
		<ul class="nav justify-content-center border-bottom pb-3 mb-3"> 
			<li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li> 
			<li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li> 
			<li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li> 
			<li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li> 
			<li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li> 
		</ul> 
		<p class="text-center text-body-secondary">© di ko alam</p> 
	</footer>
	
	<script>
		var js_data = '<?php echo json_encode($rows); ?>';
		var js_tasks = JSON.parse(js_data);
		console.log(js_tasks.length)
	</script>
	<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
	<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
	<script src="https:////cdn.datatables.net/2.3.0/js/dataTables.min.js"></script>
	<script src="<?= base_url()?>assets/js/scripts.js"></script>
</body>
</html>