import { type BreadcrumbItem } from '@/types';
import axios from 'axios';
import { Head } from '@inertiajs/react';
import { useEffect, useState } from 'react';
import AppLayout from '@/layouts/app-layout';

interface ProfileImage {
    id: number;
    userID: number;
    imageName: string;
    imageData: string;
    createdAT: string;
    updatedAT: string;
}

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Dashboard', href: '/dashboard' },
    { title: 'Profile', href: '/profile/dashboard' },
];

export default function DashboardProfile() {
    const [profileImage, setProfileImage] = useState<ProfileImage[]>([]);

    // ✅ useEffect มี dependency `[]` เพื่อป้องกัน infinite loop
    useEffect(() => {
        axios.get('/getProfileImage')
            .then(response => {
                if (response.data.status === 200) {
                    setProfileImage(response.data.profileImages);
                }
            })
            .catch(error => {
                console.error('Error getProfileImages', error);
            });
    }, []);

    console.log(profileImage);

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard Profile" />
            <div className="flex w-full items-center justify-center opacity-100 transition-opacity duration-750 lg:grow starting:opacity-0">
                <main className="flex w-full max-w-[335px] flex-col-reverse lg:max-w-4xl lg:flex-row">
                    <div className="grid grid-cols-2 md:grid-cols-3 gap-4 bg-white rounded-lg shadow-lg p-5">
                        {profileImage.length > 0 ? (
                            profileImage.map((image) => (
                                <div key={image.id} className="p-2 border rounded-lg shadow-md">
                                    <img
                                        src={image.imageData}
                                        alt="Profile"
                                        className="w-32 h-32 object-cover rounded-full"
                                    />
                                    <p className="text-sm mt-2 text-center">{image.imageName}</p>
                                </div>
                            ))
                        ) : (
                            <p className="col-span-2 md:col-span-3 text-center text-gray-500">
                                No profile image available.
                            </p>
                        )}
                    </div>
                </main>
            </div>
        </AppLayout>
    );
}
