<template lang="html">
  <div class="chat-composer">
  	<input class="no-margin-button" type="text" placeholder="tulis pesan anda..." v-model="messageText" @keydown.enter="sendMessage">
	<button type="button" class="btn btn-flat btn-send" @click="sendMessage">
		<i class="material-icons">send</i>
	</button>
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
			if ( this.messageText.length >= 1 ) {
				console.log('teks sudah benar');
			} else {
				console.log('teks terlalu pendek');
			}
			this.$emit('messagesent', {
				id_detail_kursus 	: $('#KJashkjasdb').val(),
				dari 				: $('#aASDbjkbasd').val(),
				pesan 				: this.messageText,
				created_at			: moment().format("YYYY-MM-DD HH:mm:ss"),
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

	}
	.btn-send {
		margin-top: 10px;
		width: 100px;
		display: inline;
	}
</style>
