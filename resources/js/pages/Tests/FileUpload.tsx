import AppLayout from '@/layouts/app-layout';
import { type SharedData } from '@/types';
import { Head, useForm, usePage } from '@inertiajs/react';
import { FormEvent } from 'react';

export default function FileUpload() {
    const { auth } = usePage<SharedData>().props;
    console.log(auth);
    const { data, setData, post, progress } = useForm({
        userID: auth.user.id,
        name: auth.user.name,
        imageFile: null as File | null, // กำหนด type ให้ avatar
    });

    function submit(e: FormEvent<HTMLFormElement>) {
        e.preventDefault();
        post('/file-upload-store');
    }

    return (
        <>
            <AppLayout>
                <Head title="File Upload Image Profile" />

                <div className="flex w-full items-center justify-center opacity-100 transition-opacity duration-750 lg:grow starting:opacity-0">
                    <main className="flex w-full max-w-[335px] flex-col-reverse lg:max-w-4xl lg:flex-row">
                        <form onSubmit={submit}>
                            <input type="text" value={data.name} onChange={(e) => setData('name', e.target.value)} placeholder="Enter your name" />
                            <input
                                type="file"
                                accept="image/*"
                                onChange={(e) => {
                                    if (e.target.files && e.target.files.length > 0) {
                                        setData('imageFile', e.target.files[0]);
                                    }
                                }}
                            />
                            {progress && (
                                <progress value={progress.percentage} max="100">
                                    {progress.percentage}%
                                </progress>
                            )}
                            <button type="submit">Submit</button>
                        </form>
                    </main>
                </div>
            </AppLayout>
        </>
    );
}
