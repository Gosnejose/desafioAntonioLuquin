<script setup>
    import { useForm } from '@inertiajs/vue3';
    import TextInput from '@/Components/TextInput.vue';

    const props = defineProps({
        producto: { type: Object, default: () => ({}) },
        modal: String,
        title: String,
        op: String,
        isEditable: Boolean
    });

    const form = useForm({
        id: props.producto.id,
        nombre: props.producto.nombre,
        descripcion: props.producto.descripcion,
        precio: props.producto.precio,
        stock: props.producto.stock
    });

    const save = () => {
        form.post(route('producto.store'), {
            onSuccess: () => cerrar()
        });
    }

    const update = () => {
        const id = document.getElementById('id2').value;
        form.put(route('producto.update', id), {
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
                        <div class="mb-3">
                            <label for="'id'+op" class="form-label">ID</label>
                            <TextInput :id="'id'+op" type="hidden" name="id" v-model="form.id"></TextInput>
                        </div>
                        <!-- Input para el nombre -->
                        <div class="mb-3">
                            <label for="'nombre'+op" class="form-label">Nombre</label>
                            <TextInput :id="'nombre'+op" class="form-control" type="text" name="nombre" v-model="form.nombre" maxlength="120" placeholder="Nombre" required></TextInput>
                        </div>
                        <!-- Input para la descripción -->
                        <div class="mb-3">
                            <label for="'descripcion'+op" class="form-label">Descripción</label>
                            <TextInput :id="'descripcion'+op" class="form-control" type="text" name="descripcion" v-model="form.descripcion" maxlength="255" placeholder="Descripción" required></TextInput>
                        </div>
                        <!-- Input para el precio -->
                        <div class="mb-3">
                            <label for="'precio'+op" class="form-label">Precio</label>
                            <TextInput :readonly="!isEditable" :id="'precio'+op" class="form-control" type="number" name="precio" v-model="form.precio" min="0" placeholder="Precio" required></TextInput>
                        </div>
                        <!-- Input para el stock -->
                        <div class="mb-3">
                            <label for="'stock'+op" class="form-label">Stock</label>
                            <TextInput :readonly="!isEditable" :id="'stock'+op" class="form-control" type="number" name="stock" v-model="form.stock" min="0" placeholder="Stock" required></TextInput>
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

