<template>
<div class="card">
    <div class="card-body">
        <div v-show="!sent">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" id="fromName" name="fromName" :class="{ 'is-invalid': errors.fromName }" class="form-control" v-model="fromName" :disabled="isSending" required autofocus>
                <div class="invalid-feedback" v-show="errors.fromName">
                    {{ errors.fromName && errors.fromName[0] }}
                </div>
            </div>

            <div class="form-group">
                <label for="name">Email</label>
                <input type="email" id="fromEmail" name="fromEmail" :class="{ 'is-invalid': errors.fromEmail }" class="form-control" v-model="fromEmail" :disabled="isSending" required>
                <div class="invalid-feedback" v-show="errors.fromEmail">
                    {{ errors.fromEmail && errors.fromEmail[0] }}
                </div>
            </div>

            <div class="form-group">
                <label for="name">Asunto</label>
                <select id="subjectId" name="subjectId" :class="{ 'is-invalid': errors.subjectId }" class="custom-select" v-model="subjectId" :disabled="isSending" required>
                    <option value=""></option>
                    <option v-for="(value, key) in subjects" :value="key" :key="key">
                        {{ value }}
                    </option>
                </select>
                <div class="invalid-feedback" v-show="errors.subjectId">
                    {{ errors.subjectId && errors.subjectId[0] }}
                </div>
            </div>

            <div class="form-group">
                <label for="body">Mensaje</label>
                <textarea id="body" name="body" :class="{ 'is-invalid': errors.body }" class="form-control" rows="4" v-model="body" :disabled="isSending" required></textarea>
                <div class="invalid-feedback" v-show="errors.body">
                    {{ errors.body && errors.body[0] }}
                </div>
            </div>

            <button class="btn btn-success" :disabled="isSending" @click="send">
                Enviar
            </button>
        </div>
        <div class="alert alert-success m-0" role="alert" v-show="sent">
            Su mensaje fue enviado
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: {
        "subjects": Object
    },

    data() {
        return {
            isSending: false,
            sent: false,
            fromName: this.fromName,
            fromEmail: this.frmEmail,
            subjectId: this.subjectId,
            body: this.body,
            errors: [],
        };
    },

    methods: {
        send() {
            this.isSending = true

            axios.post('/messages', {
                fromName: this.fromName,
                fromEmail: this.fromEmail,
                subjectId: this.subjectId,
                body: this.body,
            }).then(result => {
                this.fromName = ''
                this.fromEmail = ''
                this.subjectId = ''
                this.body = ''
                this.sent = true
            }).catch(error => {
                this.isSending = false
                this.errors = error.response.data.errors
            })
        },
  }
}
</script>
