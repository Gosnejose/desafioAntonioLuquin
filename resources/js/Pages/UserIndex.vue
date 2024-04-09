<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ModalProducto from '@/Components/ModalUsuario.vue';
import Swal from 'sweetalert2';
import { Head } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';

const form = useForm({});
const props = defineProps({
    productos: { type: Object }
});

const eliminar = (id, name) => {
    const swalWithBootstrapButtons = Swal.mixin({
        buttonsStyling: true
    })
    swalWithBootstrapButtons.fire({
        title: '¿Seguro de eliminar el producto ' + name + '?',
        text: 'Esta acción no se puede deshacer',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: '<i class="fa-solid fa-check"></i> Si, eliminar',
        cancelButtonText: '<i class="fa-solid fa-ban"></i> Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            form.delete(route('producto.destroy', id));
        }
    })
};

const openModal = (producto) => {
    // Asigna los valores del producto a los campos del formulario dentro del modal
    document.getElementById('id3').value = producto.id;
    document.getElementById('nombre3').value = producto.nombre;
    document.getElementById('descripcion3').value = producto.descripcion;
    document.getElementById('precio3').value = producto.precio;
    document.getElementById('stock3').value = producto.stock;
}
</script>

<template>
    <AppLayout title="Productos">
        <!-- Contenido principal -->
        <div class="container-fluid mt-3 bg-white">
            <div class="row mt-3">
                <div class="col-md-4 offset-md-4">
                    <div class="d-grid mx-auto">
                        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalCreate">
                            <i class="fa-solid fa-circle-plus"></i> Añadir Producto
                        </button>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-10 offset-md-1">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>NOMBRE</th>
                                    <th>DESCRIPCION</th>
                                    <th>PRECIO</th>
                                    <th>STOCK</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(producto, index) in productos" :key="producto.id">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ producto.nombre }}</td>
                                    <td>{{ producto.descripcion }}</td>
                                    <td>{{ producto.precio }}</td>
                                    <td>{{ producto.stock }}</td>
                                    <td>
                                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit" @click="openModal(producto)">
                                            <i class="fa-solid fa-edit"></i> Editar
                                        </button>
                                        <button class="btn btn-danger" @click="eliminar(producto.id, producto.nombre)">
                                            <i class="fa-solid fa-trash"></i> Eliminar
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modales -->
        <ModalProducto :modal="'modalCreate'" :title="'Añadir Producto'" :op="'1'"></ModalProducto> 
        <ModalProducto :modal="'modalEdit'" :title="'Editar Producto'" :op="'2'"></ModalProducto>
    </AppLayout>
</template>

<style scoped>
/* Aquí puedes agregar estilos personalizados para mejorar el diseño */

.table-responsive {
    overflow-x: auto;
}
.table {
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
    background-color: transparent;
    border-collapse: collapse;
}
.table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(0, 0, 0, 0.05);
}
.table-dark.table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(255, 255, 255, 0.05);
}
.table th, .table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}
.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
}
.table tbody + tbody {
    border-top: 2px solid #dee2e6;
}
.table-sm th, .table-sm td {
    padding: 0.3rem;
}
.btn {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    user-select: none;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out,
                border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.btn-dark {
    color: #fff;
    background-color: #343a40;
    border-color: #343a40;
}
.btn-dark:hover {
    color: #fff;
    background-color: #23272b;
    border-color: #1d2124;
}
.btn-warning {
    color: #212529;
    background-color: #ffc107;
    border-color: #ffc107;
}
.btn-warning:hover {
    color: #212529;
    background-color: #e0a800;
    border-color: #d39e00;
}
.btn-danger {
    color: #fff;
    background-color: #dc3545;
    border-color: #dc3545;
}
.btn-danger:hover {
    color: #fff;
    background-color: #c82333;
    border-color: #bd2130;
}
</style>
