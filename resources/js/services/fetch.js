import { http, httpFile } from "./http";

export function generateLink(data) {
    return http().post('/links', data);
}

export function loadLinks() {
    return http().get('/links');
}

export function loadStat(id) {
    return http().get(`/link/stat/${id}`);
}

export function deleteLink(id) {
    return http().delete(`/link/${id}`);
}

export function activateLink(id) {
    return http().get(`/link/activate/${id}`);
}

export function deactivateLink(id) {
    return http().get(`/link/deactivate/${id}`);
}
