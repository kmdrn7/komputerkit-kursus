<template lang="html">
	<div class="chat-message">
		<small>{{ pesan.dari }}</small>
		<p>{{ pesan.pesan }}</p>
	</div>
</template>

<script>
export default {
	props : ['pesan']
}
</script>

<style lang="css">
	.chat-message {
		padding: 1rem;
	}
	.chat-message > p {
		margin-bottom: .5rem;
	}
</style>
