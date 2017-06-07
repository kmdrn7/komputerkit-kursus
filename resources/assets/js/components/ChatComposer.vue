<template lang="html">
  <div class="chat-composer">
  	<input type="text" placeholder="type your message" v-model="messageText" @keydown.enter="sendMessage">
	<button type="button" class="btn btn-primary" @click="sendMessage">Send</button>
  </div>
</template>

<script>

export default {
	data() {
		return {
			messageText : ""
		}
	},
	methods : {
		sendMessage() {
			this.$emit('messagesent', {
				id_detail_kursus 	: $('#KJashkjasdb').val(),
				dari 				: $('#aASDbjkbasd').val(),
				pesan 				: this.messageText,
			});
			this.messageText = '';
		}
	}
}
</script>

<style lang="css">
	.chat-composer {
		display: flex;
	}

	.chat-composer input {
		flex: 1 auto;
	}

	.chat-composer button {
		border-radius: 0;
	}
</style>
