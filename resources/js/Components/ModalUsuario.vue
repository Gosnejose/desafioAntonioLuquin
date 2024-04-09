<script setup>
    import { useForm } from '@inertiajs/vue3';
    import TextInput from '@/Components/TextInput.vue';

    const props = defineProps({
        usuario: { type: Object, default: () => ({}) },
        roles: { type: Object, default: () => ({}) },
        modal: String,
        title: String,
        op: String
    });

    const form = useForm({
        id: props.usuario.id,
        name: props.usuario.name,
        email: props.usuario.email,
        role_id: props.usuario.role_id,
    });

    const save = () => {
        const password1 = document.getElementById('password1').value;

        const formSave = useForm({
            id: form.id,
            name: form.name,
            email: form.email,
            password: password1,
            role_id: form.role_id,
        });


        formSave.post(route('usuario.store'), {
            onSuccess: () => cerrar()
        });
    }

  const update = () => {
        const id = document.getElementById('id2').value;
        form.put(route('usuario.update', id), {
            onSuccess: () => cerrar()
        });
    }

    const cerrar = () => {
        form.reset();
        document.querySelector('#cerrar' + props.op).click();
    };
</script>

<template>
    <div class="modal fade" :id="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ title }}</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="(op === '1' ? save() : update())">
                        <!-- Input para el ID -->
                            <TextInput :id="'id'+op" type="hidden" name="id" v-model="form.id"></TextInput>
                        <!-- Input para el nombre -->
                        <div class="mb-3">
                            <label for="'name'+op" class="form-label">Nombre</label>
                            <TextInput :id="'name'+op" class="form-control" type="text" name="name" v-model="form.name" maxlength="120" placeholder="Nombre" required></TextInput>
                        </div>
                        <!-- Input para el email -->
                        <div class="mb-3">
                            <label for="'email'+op" class="form-label">Email</label>
                            <TextInput :id="'email'+op" class="form-control" type="email" name="email" v-model="form.email" maxlength="255" placeholder="Email" required></TextInput>
                        </div>
                        <div class="mb-3">
                            <label for="'role'+op" class="form-label">Rol</label>
                            <select :id="'role'+op" class="form-select" v-model="form.role_id" required>
                                    <option value="" disabled selected>Selecciona un rol</option>
                                <option v-for="role in roles" :key="role.id" :value="role.id">{{ role.name }}</option>
                            </select>
                        </div>                        
                        <!-- Input para el Password -->
                        <div v-if="(op === '1')" class="mb-3">
                            <label for="'password'+op" class="form-label">Password</label>
                            <TextInput :id="'password'+op" class="form-control" type="password" name="password" v-model="form.password" maxlength="255" placeholder="Password" required></TextInput>
                        </div>
                        
                        <div class="d-grid mx-auto">
                            <button class="btn btn-success" :disabled="form.processing"><i class="fa-solid fa-save"></i> Guardar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-dark" type="button" :id="'cerrar'+op" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</template>
