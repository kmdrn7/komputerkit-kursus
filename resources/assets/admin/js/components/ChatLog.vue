<template lang="html">
	<div class="chat-log">
		<chat-message v-for="pesan in messages" :pesan="pesan" :key="pesan.id_pesan">

		</chat-message>
	</div>
</template>

<script>
export default {
	props: ['messages']
};
</script>
