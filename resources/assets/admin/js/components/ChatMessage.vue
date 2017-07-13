<template lang="html">
	<div class="row row-message">
		<div class="col-md-12 col-sm-12">
			<div v-if="pesan.dari == 'admin'">
				<div class="message-from message-admin">
					{{ pesan.dari }}
				</div>
				<div class="white message-item message-admin">
					{{ pesan.pesan }}
				</div>
			</div>
			<div v-else>
				<div class="message-from message-user">
					{{ pesan.created_at }}
				</div>
				<div class="white message-item message-user">
					{{ pesan.pesan }}
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	props : ['pesan']
}
</script>

<style>
</style>
